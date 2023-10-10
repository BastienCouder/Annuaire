<?php
require './src/dbConnect.php';
require './configs/global.php';

if (isset($_POST['name']) && isset($_POST['surname'])) {
    $tableName = 'contacts';
    $newData = [
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel'],
        'year' => $_POST['year'],
        'specialite' => $_POST['specialite'],
    ];
    create($tableName, $newData);

    echo 
    "<div class='w-full flex pt-8 justify-center items-center'>
    Enregistrement ajouté avec succès !
    </div>";
}
?>


<div class="flex mx-8 md:justify-center md:items-center pt-10 h-[80vh]">
<form action="#" method="post" class='w-1/2'>
  <h1 class='text-2xl lg:text-4xl font-bold lg:mb-10 mb-4'>S'enregistrer</h1>
<ul class='flex flex-col gap-4'>
  <div class='flex gap-y-4 gap-x-8 flex-col md:flex-row'>
  <li>
    <label for="name">Prénom</label>
    <input type="text" id="name" name="name" required class="relative md:w-[16rem] m-0 -mr-0.5 block min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none"/>
  </li>
  <li>
    <label for="surname">Nom</label>
    <input type="text" id="surname" name="surname" required class="relative md:w-[16rem] m-0 -mr-0.5 block min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none" />
  </li>
  </div>
  <li>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required class="relative md:w-[34rem] m-0 -mr-0.5 block min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none"/>
  </li>
  <li>
    <label for="tel">Téléphone</label>
    <input type="text" id="tel" name="tel" required class="relative md:w-[34rem] m-0 -mr-0.5 block min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none"/>
  </li>
  <div class='flex gap-y-4 gap-x-8 flex-col md:flex-row'>
  <li>
    <label for="year">Année</label>
    <select id="year" name="year" class="appearance-none relative m-0 -mr-0.5 block min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none">
      <option value="A1">Année 1</option>
      <option value="A2">Année 2</option>
      <option value="A3">Année 3</option>
      <option value="M1">Master 1</option>
      <option value="M2">Master 2</option>
    </select>
  </li>
  <li>
    <label for="specialite">Spécialité</label>
    <select id="specialite" name="specialite" class="appearance-none relative m-0 -mr-0.5 block min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none">
     <option value="Tronc commun">Tronc commun</option>
      <option value="Communication digitale">Communication digitale</option>
      <option value="Communication graphique">Communication graphique</option>
      <option value="Développement web">Développement web</option>
      <option value="Marketing digital">Marketing digital</option>
    </select>
  </li>
  </div>
</ul>
<input type="submit" value="Envoyer" class='my-6 px-3 py-2 border-2 border-black'>
</form>
</div>
