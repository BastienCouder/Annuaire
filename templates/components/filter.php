<?php
$selectedFiltered = '';
$filterKey = '';

if (isset($_GET['speciality'])) {
    $selectedFiltered = $_GET['speciality'];
    $filterKey = 'specialite';
  
} elseif (isset($_GET['year'])) {
    $selectedFiltered = $_GET['year'];
    $filterKey = 'year';
 }

if (isset($_POST['filter_speciality'])) {
    $selectedFiltered = $_POST['filter_speciality'];

} elseif (isset($_POST['filter_year'])) {
    $selectedFiltered = $_POST['filter_year'];
}

$filtered = getFiltered($data,$filterKey, $selectedFiltered);

$specialities = array(
    'Communication graphique' => 'blue-500',
    'Communication digitale' => 'violet-700',
    'Développement web' => 'yellow-500',
    'Marketing digital' => 'red-800',
    'Tronc commun' => 'black'
);


$years = array(
    'A1' => 'green-700',
    'A2' => 'green-800',
    'A3' => 'green-900',
    'M1' => 'orange-800',
    'M2' => 'orange-900',
);


?>

<div class="flex flex-col mx-4 my-2 space-y-4">
    <div>
        <div class="flex gap-4 items-center pb-4">
            <h2 class="text-xl font-bold ">Spécialités</h2>
            <?php
            if (!empty($selectedFiltered) && $filterKey == 'specialite') {
                echo  '<a href="./?page=accueil&layout=html"><i class="fa-solid fa-xmark mt-2"></i></a>';
            }     
        ?>    
        </div>
        <div class="flex gap-4 flex-wrap xl:w-4/5">
        <?php
            foreach ($specialities as $speciality => $borderColor) {
                $activeClass = ($selectedFiltered === $speciality) ? 'bg-gray-300' : '';
                echo '<a href="./?page=accueil&layout=html&speciality=' . urlencode($speciality) . '" class="px-3 py-2 border-2 border-' . $borderColor . ' ' . $activeClass . '">' . $speciality . '</a>';
            }
        ?>
        </div>
    </div>
    <div>
        <div class="flex gap-4 items-center pb-4">
            <h2 class="text-xl font-bold ">Promos</h2>
            <?php
            if (!empty($selectedFiltered)  && $filterKey == 'year') {
                echo  '<a href="./?page=accueil&layout=html"><i class="fa-solid fa-xmark mt-2"></i></a>';
            }     
        ?>    
        </div>
        <div class="flex gap-4 flex-wrap w-5/6 lg:w-2/3 xl:w-1/2">
        <?php
            foreach ($years as $year => $borderColor) {
                $activeClass = ($selectedFiltered === $year) ? 'bg-gray-300' : '';
                echo '<a href="./?page=accueil&layout=html&year=' . urlencode($year) . '" class="px-3 py-2 border-2 border-' . $borderColor . ' '. $activeClass . '">' . $year . '</a>';
            }
        ?>
        </div>
    </div>
</div>
