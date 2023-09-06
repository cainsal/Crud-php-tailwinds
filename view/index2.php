    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <link href="/dist/output.css" rel="stylesheet"> 
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  </head>

  <body class="font-principal">
    <?php

      include("includes/header.php")
    
    ?>

    <figure class="absolute inset-0 overflow-hidden pointer-events-none">
        <img src="/view/resources/images/bg-tablet-pattern.svg" class="absolute w-full -z-10 -top-24 -right-1/4 max-w-2xl">
    </figure>

    <main>
      <section class="wrapper text-center py-24 grid gap-12 md:grid-cols-2 md:text-left">
        <article>
          <h2 class="text-3xl font-bold text-very-dark-blue mb-6 md:text-4xl">
            What’s different about Manage?
          </h2>
          <p class="text-dark-grayish-blue">
            Manage provides all the functionality your team needs, without the complexity. Our software is tailor-made for modern digital product teams.
          </p>
        </article>

        <div class="grid gap-12">
          <article class="space-y-4 md:space-y-6">
            <p class="bg-very-pale-red rounded-l-full font-bold flex items-center md:bg-transparent">
              <span class="bg-bright-red text-white px-6 rounded-full py-2">
                01
              </span>
              <span class="flex-1 p-2">
                Track company-wide progress
              </span>
            </p>

            <p class="text-dark-grayish-blue text-left">
              See how your day-to-day tasks fit into the wider vision. Go from tracking progress at the milestone level all the way done to the smallest of details. Never lose sight of the bigger picture again.
            </p>
          </article>

          <article class="space-y-4 md:space-y-6">
            <p class="bg-very-pale-red rounded-l-full font-bold flex items-center md:bg-transparent">
              <span class="bg-bright-red text-white px-6 rounded-full py-2">
                02
              </span>
              <span class="flex-1 p-2">
                Advanced built-in reports
              </span>
            </p>
            <p class="text-dark-grayish-blue text-left">
              Set internal delivery estimates and track progress toward company goals. Our customisable dashboard helps you build out the reports you need to keep key stakeholders informed.
            </p>
          </article>

          <article class="space-y-4 md:space-y-6">
            <p class="bg-very-pale-red rounded-l-full font-bold flex items-center md:bg-transparent">
              <span class="bg-bright-red text-white px-6 rounded-full py-2">
                03
              </span>
              <span class="flex-1 p-2">
                Everything you need in one place
              </span>
            </p>
            <p class="text-dark-grayish-blue text-left">
              Stop jumping from one service to another to communicate, store files, track tasks and share documents. Manage offers an all-in-one team productivity solution.
            </p>
          </article>
        </div>
      </section>

      <section class="wrapper text-center py-24 max-w-lg mx-auto md:max-w-xl">
        <h2 class="text-3xl font-bold text-very-dark-blue md:text-4xl">
          What they’ve said
        </h2>
        <div class="mt-24 mb-14">
          <article class="bg-vary-light-gray pt-16 pb-12 px-4 relative">
            <img src="/view/resources/images/avatar-ali.png" class="absolute w-24 aspect-square -top-12 inset-x-0 mx-auto">

            <h3 class="text-xl mb-4 pt-2 font-bold text-very-dark-blue">
              Ali Bravo
            </h3>

            <p class="text-dark-grayish-blue">
              “We have been able to cancel so many other subscriptions since using Manage. There is no more cross-channel confusion and everyone is much more focused.”
            </p>
          </article>
        </div>
        <a href="#" class="button mx-auto shadow-xl shadow-bright-red/30">Get Started</a>
      </section>

      <section class="bg-bright-red font-bold">
        <div class="wrapper py-24 text-center grid gap-6 md:grid-cols-[40%_40%] md:justify-between md:items-center md:text-left">
          <h2 class="text-4xl text-very-pale-red">
            Simplify how your team works today.
          </h2>
          <a href="#" class="button text-bright-red bg-vary-light-gray mx-auto md:mx-0 md:justify-self-end">
            Get Started
          </a>
        </div>
      </section>
    </main>

    
      
  <?php
    include("includes/footer.php");
  ?>

</body>
</html>