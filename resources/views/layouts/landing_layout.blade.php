<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="assets/css/landing_page.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Darker Grotesque:wght@500;600;700;800;900&display=swap" />
    <title>TalentHunt Connect</title>
</head>

<body>


    @yield('landing-page')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const monthlyBtn = document.querySelector('.monthly-wrapper');
            const annuallyBtn = document.querySelector('.annually-wrapper');
            const planElements = document.querySelectorAll('[data-plan-type]');

            const pricing = {
                basic: {
                    monthly: '$45/Month',
                    annually: '$450/Year'
                },
                business: {
                    monthly: '$75/Month',
                    annually: '$750/Year'
                },
                enterprise: {
                    monthly: '$105/Month',
                    annually: '$1050/Year'
                }
            };

            function updatePlans(planType) {
                planElements.forEach(element => {
                    const type = element.getAttribute('data-plan-type');
                    const priceElement = element.querySelector('.month, .month1, .month2');
                    priceElement.textContent = pricing[type][planType];
                });
            }

            monthlyBtn.addEventListener('click', function() {
                updatePlans('monthly');
            });

            annuallyBtn.addEventListener('click', function() {
                updatePlans('annually');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerMenu = document.querySelector('.hamburger-menu');
            const mobileNav = document.querySelector('.mobile-nav');

            hamburgerMenu.addEventListener('click', function() {
                mobileNav.classList.toggle('show');
            });
        });
    </script>
</body>

</html>
