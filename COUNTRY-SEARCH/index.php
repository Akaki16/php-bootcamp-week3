<?php include 'inc/header.php' ?>

<?php
    $errors = [];

    if (isset($_GET['search'])) {
        $country_name = htmlspecialchars($_GET['country_name']);
        
        $country = get_api_data(
            url: 'https://restcountries.com/v3.1/name/'.$country_name,
            user_agent: '',
            http_header: []
        );

        if (array_key_exists(0, $country)) {
            echo $country[0]['name']['common'];
        }
    }
?>

<section class="relative w-full max-w-md px-5 py-4 mx-auto rounded-md">
    <br />
    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET" class="md:flex">
            <input style="border-radius: 0px;" autocomplete="off" type="text" name="country_name" class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Enter a country name">

            <button name="search" type="submit" style="border-radius: 0px;" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Search
            </button>
        </form>
    </div>
</section>

<?php include 'inc/footer.php' ?>