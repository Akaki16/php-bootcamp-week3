<?php include 'inc/header.php' ?>

<?php
    $countries = get_countries_from_db();
?>

<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">Explore Your Searched Countries</h1>

        <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error alias, adipisci rem similique, at omnis eligendi optio eos harum.
        </p>

        <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($countries as $country): ?>
                <div class="flex flex-col items-center p-8 transition-colors duration-200 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-blue-600 dark:border-gray-700 dark:hover:border-transparent">
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300" src="<?php echo $country['flag'] . '.' . 'png' ?>" alt="<?php echo $country['name'] ?>">

                <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">
                    <?php echo $country['name'] ?>
                </h1>

                <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">
                    <?php echo number_format($country['population']) ?>
                </p>
                <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">
                    <?php echo $country['capital'] ?>
                </p>
                <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">
                    <?php echo $country['region'] ?>
                </p>
                <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">
                    <?php echo $country['subregion'] ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>