<!-- resources/views/stripe.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stripe Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <style>
        body {
            background-color: #1a1f2e;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .checkout-wrapper {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 820px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .section-title {
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #111;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 4px;
        }

        .form-control {
            border: 1px solid #d9d9d9;
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 0.9rem;
            color: #555;
            background: #fff;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #7c6fcd;
            box-shadow: 0 0 0 3px rgba(124, 111, 205, 0.15);
            outline: none;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .divider {
            width: 1px;
            background-color: #e8e8e8;
            margin: 0 30px;
        }

        .cards-accepted {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-icon {
            height: 28px;
            border-radius: 4px;
            border: 1px solid #e0e0e0;
        }

        .btn-submit {
            background: #7c6fcd;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            width: 100%;
            margin-top: 24px;
            transition: background 0.2s, transform 0.1s;
            letter-spacing: 0.03em;
        }

        .btn-submit:hover {
            background: #6a5db8;
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Stripe card element styling */
        #card-element {
            padding: 10px 14px;
            border: 1px solid #d9d9d9;
            border-radius: 6px;
            background: #fff;
            transition: border-color 0.2s;
        }

        #card-element.StripeElement--focus {
            border-color: #7c6fcd;
            box-shadow: 0 0 0 3px rgba(124, 111, 205, 0.15);
        }

        #card-errors {
            font-size: 0.85rem;
        }

        .cards-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        @media (max-width: 767px) {
            .divider { display: none; }
            .checkout-wrapper { padding: 24px 18px; }
        }
    </style>
</head>

<body>
    <div class="checkout-wrapper">

        @php
            $signup = $signupData ?? session('signup_data', []);
            $plan = $plan ?? session('selected_plan', 'basic');
            $planDetails = $planDetails ?? [
                'name' => 'Basic Plan',
                'price' => 1000,
                'duration' => '1 Month',
            ];
        @endphp

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form id="payment-form" action="{{ route('stripe.post') }}" method="POST">
            @csrf
            <input type="hidden" name="stripeToken" id="stripeToken">
            <input type="hidden" name="plan" value="{{ $plan }}">
            <input type="hidden" name="amount" value="{{ $planDetails['price'] }}">
            <div class="d-flex flex-column flex-md-row">

                <!-- ===== BILLING ADDRESS ===== -->
                @if(!isset($isRenewal) || !$isRenewal)
                <div class="flex-grow-1">
                    <div class="section-title">Billing Address</div>

                    <div class="mb-3">
                        <label class="form-label">Full Name :</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Jacob Aiden" value="{{ old('full_name', $signupData['name'] ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" placeholder="example@example.com" value="{{ old('email', $signupData['email'] ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address :</label>
                        <input type="text" name="address" class="form-control" placeholder="Room - Street - Locality" value="{{ old('address', $signupData['address'] ?? '') }}">
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="divider d-none d-md-block"></div>
                @endif

                <!-- ===== PAYMENT ===== -->
                <div class="flex-grow-1">
                    @if(isset($isRenewal) && $isRenewal)
                    <div class="section-title">Renew Your Subscription</div>
                    <div class="mb-4 p-3 rounded" style="background:#e8f4fd; border:1px solid #bee3f8;">
                        <p class="mb-1"><strong>Welcome back!</strong></p>
                        <p class="mb-0">You're renewing your {{ ucfirst($plan) }} plan subscription.</p>
                    </div>
                    @else
                    <div class="section-title">Payment</div>
                    @endif

                    <!-- Cards Accepted -->
                    <div class="cards-label">Cards Accepted :</div>
                    <div class="cards-accepted mb-3">
                        <!-- PayPal -->
                        <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 124 33" height="28" style="border:1px solid #e0e0e0;border-radius:4px;padding:3px 6px;background:#fff;">
                            <path fill="#009cde" d="M46.2 6.6h-6.7c-.5 0-.9.3-1 .8L35.9 24c-.1.3.2.6.5.6h3.2c.5 0 .9-.3 1-.8l.8-5c.1-.5.5-.8 1-.8h2.1c4.4 0 6.9-2.1 7.6-6.3.3-1.8 0-3.3-.8-4.3-.9-1.1-2.5-1.8-5.1-1.8zm.8 6.2c-.4 2.4-2.2 2.4-4 2.4h-1l.7-4.5c0-.3.3-.5.6-.5h.5c1.2 0 2.3 0 2.9.7.4.4.4 1.1.3 1.9z"/>
                            <path fill="#003087" d="M22.2 6.6h-6.7c-.5 0-.9.3-1 .8L11.9 24c-.1.3.2.6.5.6h3.2c.5 0 .9-.3 1-.8l.8-5c.1-.5.5-.8 1-.8h2.1c4.4 0 6.9-2.1 7.6-6.3.3-1.8 0-3.3-.8-4.3-.9-1.1-2.5-1.8-5.1-1.8zm.8 6.2c-.4 2.4-2.2 2.4-4 2.4h-1l.7-4.5c0-.3.3-.5.6-.5h.5c1.2 0 2.3 0 2.9.7.3.4.4 1.1.3 1.9z"/>
                            <path fill="#009cde" d="M68.3 12.7h-3.2c-.3 0-.6.2-.6.5l-.2.9-.3-.4c-.8-1.2-2.6-1.6-4.4-1.6-4.1 0-7.7 3.1-8.3 7.5-.4 2.2.1 4.3 1.4 5.7 1.1 1.3 2.8 1.9 4.7 1.9 3.3 0 5.2-2.1 5.2-2.1l-.2.9c-.1.3.2.6.5.6h2.9c.5 0 .9-.3 1-.8l1.7-10.7c.1-.1-.2-.4-.2-.4zm-4.5 7.2c-.4 2.1-2.1 3.6-4.3 3.6-1.1 0-2-.4-2.6-1-.6-.7-.8-1.6-.6-2.6.3-2.1 2.1-3.6 4.3-3.6 1.1 0 2 .4 2.6 1 .6.7.8 1.6.6 2.6z"/>
                        </svg>
                        <!-- Mastercard -->
                        <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 30" height="28" style="border:1px solid #e0e0e0;border-radius:4px;padding:2px 4px;background:#fff;">
                            <circle cx="17" cy="15" r="12" fill="#EB001B"/>
                            <circle cx="31" cy="15" r="12" fill="#F79E1B"/>
                            <path d="M24 5.8a12 12 0 0 1 0 18.4A12 12 0 0 1 24 5.8z" fill="#FF5F00"/>
                        </svg>
                        <!-- Visa -->
                        <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 780 500" height="28" style="border:1px solid #e0e0e0;border-radius:4px;padding:3px 8px;background:#fff;">
                            <path d="M293.2 348.7l33.4-195.8h53.4l-33.4 195.8z" fill="#00579F"/>
                            <path d="M524.3 156.4c-10.6-4-27.2-8.2-47.9-8.2-52.8 0-90 26.5-90.3 64.5-.3 28 26.5 43.6 46.7 52.9 20.7 9.5 27.7 15.6 27.6 24.1-.1 13-16.6 18.9-31.9 18.9-21.3 0-32.6-2.9-50.1-10.1l-6.9-3.1-7.5 43.6c12.4 5.4 35.4 10.1 59.3 10.3 55.9 0 92.2-26.1 92.6-66.6.2-22.2-14-39.1-44.7-53-18.6-9-30-15-29.9-24.1 0-8.1 9.7-16.8 30.5-16.8 17.4-.3 30 3.5 39.8 7.4l4.8 2.2 7.9-43.9" fill="#00579F"/>
                            <path d="M641.4 152.9h-41.2c-12.8 0-22.3 3.5-27.9 16.2L490 348.7h55.9l11.2-29.3h68.3c1.6 6.8 6.5 29.3 6.5 29.3H683l-41.6-195.8zm-65.7 126.1c4.4-11.3 21.2-54.7 21.2-54.7-.3.5 4.4-11.3 7.1-18.6l3.6 16.8s10.2 46.7 12.4 56.5h-44.3z" fill="#00579F"/>
                            <path d="M230.5 152.9l-52.4 133.5-5.6-27.2c-9.7-31.2-40-65-73.8-81.9l47.9 171.3 56.6-.1 84.2-195.6h-56.9" fill="#00579F"/>
                            <path d="M131.1 152.9H44.8l-.7 3.9c66.8 16.2 111 55.3 129.4 102.3L155 169.3c-3.2-12.5-12.5-16-23.9-16.4" fill="#FAA61A"/>
                        </svg>
                        <!-- Discover -->
                        <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750 471" height="28" style="border:1px solid #e0e0e0;border-radius:4px;padding:2px 6px;background:#fff;">
                            <path fill="#231F20" d="M0 0h750v471H0z"/>
                            <path fill="#F76F20" d="M747 325c-93 127-289 175-444 107C147 364 58 256 47 136 37 28 97-47 205-71 355-102 567 24 668 170L747 325z"/>
                            <circle fill="#F76F20" cx="385" cy="235" r="90"/>
                            <path fill="#FFF" d="M115 183h27c29 0 48 18 48 48 0 31-19 50-48 50h-27V183zm17 82h9c19 0 31-12 31-34 0-21-12-33-31-33h-9v67zM205 183h17v98h-17zM261 281l-38-98h19l26 68 26-68h18l-38 98h-13zM426 183h17v98h-17zM457 232c0-29 22-52 51-52 9 0 17 2 25 6v20c-7-7-16-11-26-11-19 0-33 15-33 37s14 37 34 37c10 0 19-4 26-11v20c-8 4-17 6-26 6-30 0-51-23-51-52zM544 183h46v15h-29v24h28v15h-28v29h29v15h-46V183zM360 254c0 16 9 27 24 27 8 0 14-3 23-11l9 11c-10 10-20 15-33 15-23 0-40-17-40-42 0-24 17-42 39-42 14 0 24 5 34 16l-9 11c-8-9-15-13-23-13-15 0-24 12-24 28z"/>
                        </svg>
                    </div>

                    <!-- Order Summary (from image 2 - preserved) -->
                    <div class="mb-3 p-3 rounded" style="background:#f8f9fb; border:1px solid #eee;">
                        <p class="mb-1" style="font-size:0.88rem;"><strong>{{ strtoupper($planDetails['name']) }}</strong></p>
                        <p class="mb-1" style="font-size:0.88rem;"><strong>PRICE:</strong> Rs{{ $planDetails['price'] }}</p>
                        <strong>DURATION:</strong> {{ $planDetails['days'] }} days
                        <p class="mb-0" style="font-size:0.88rem;"><strong>{{ ucfirst($plan) }} plan</strong></p>
                    </div>

                    <!-- Stripe Card Element (from image 2 - logic preserved) -->
                    <div class="mb-3">
                        <label class="form-label">Credit or debit card</label>
                        <div id="card-element"></div>
                        <div id="card-errors" class="text-danger mt-2" role="alert"></div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submit-button" class="btn-submit">Pay Now</button>

        </form>
    </div>

    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>

    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const card = elements.create('card', {
            style: {
                base: {
                    fontSize: '15px',
                    color: '#555',
                    '::placeholder': { color: '#aaa' }
                }
            }
        });
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const errorElement = document.getElementById('card-errors');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                console.log(result);
                if (result.error) {
                    errorElement.textContent = result.error.message;
                } else {
                    document.getElementById('stripeToken').value = result.token.id;
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>