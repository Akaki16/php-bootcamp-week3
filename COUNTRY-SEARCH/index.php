<?php include 'inc/header.php' ?>

<?php

$errors = [];

function wrap_str_quotes(string $str): string
{
    return '"' . trim($str, "''") . '"';
}

if (isset($_GET['search'])) {
    $country_name = htmlspecialchars($_GET['country_name']);
    // this name will be used in SELECT statement
    $country_name_to_query = wrap_str_quotes($country_name);

    // check if country name contains alphabet characters
    if (!ctype_alpha($country_name)) {
        $errors['country_name'] = 'Please enter a country name and use alphabet characters';
    } else {
        $errors['country_name'] = '';
    }

    // store country names so later we will be able to compare them with user entered countries
    $country_names = [];

    if (ctype_alpha($country_name)) {
        // if country is not in db call an api
        if (!in_array(strtolower($country_name), $country_names)) {
            $country = get_country_from_api();
        }

        if (!empty($country) && array_key_exists(0, $country)) {
            $country_props = get_country_props($country);
        }

        $countries = get_countries_from_db();

        for ($i = 0; $i < count($countries); $i++) {
            array_push($country_names, strtolower($countries[$i]['name']));
        }

        if (!empty($country_props)) {
            $country_name = strtolower($country_props['name']);
            $country_population = $country_props['population'];
            $country_capital = $country_props['capital'];
            $country_region = $country_props['region'];
            $country_subregion = $country_props['sub_region'];
            $country_img_path = download_country_img($country_props);
        }

        // INSERT country information into db
        if (!empty($country_props) && !in_array(strtolower($country_name), $country_names)) {
            $sql = "INSERT INTO countries (name, population, capital, region, subregion, flag) VALUES ('$country_name', '$country_population', '$country_capital', '$country_region', '$country_subregion', '$country_img_path')";

            $result = mysqli_query($conn, $sql);
        }

        $country_data = get_country_from_db();
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

<?php if (!empty($errors['country_name'])) : ?>
    <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-center w-12 bg-red-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-red-500 dark:text-red-400">Alert</span>
                <p class="text-sm text-gray-600 dark:text-gray-200">
                    <?php echo $errors['country_name'] ?>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>

<br />

<?php if (isset($country_data)): ?>
    <div class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <img class="object-cover w-full h-56" src="<?php echo $country_data[6] . '.' . 'png' ?>" alt="<?php echo $country_data[1] ?>">
        
        <div class="py-5 text-center">
            <a href="#" class="block text-2xl font-bold text-gray-800 dark:text-white">
                Population
            </a>
            <span class="text-sm text-gray-700 dark:text-gray-200">
                <?php echo $country_data[2] ?>
            </span>
        </div>
        <div class="py-5 text-center">
            <a href="#" class="block text-2xl font-bold text-gray-800 dark:text-white">
                Capital
            </a>
            <span class="text-sm text-gray-700 dark:text-gray-200">
                <?php echo $country_data[3] ?>
            </span>
        </div>
        <div class="py-5 text-center">
            <a href="#" class="block text-2xl font-bold text-gray-800 dark:text-white">
                Region
            </a>
            <span class="text-sm text-gray-700 dark:text-gray-200">
                <?php echo $country_data[4] ?>
            </span>
        </div>
        <div class="py-5 text-center">
            <a href="#" class="block text-2xl font-bold text-gray-800 dark:text-white">
                Subregion
            </a>
            <span class="text-sm text-gray-700 dark:text-gray-200">
                <?php echo $country_data[5] ?>
            </span>
        </div>
    </div>
<?php endif; ?>
            
<?php include 'inc/footer.php' ?>