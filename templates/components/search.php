<?php
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $data = read('contacts', $searchTerm);
} else {
    $data = read('contacts');
}
?>

<div class='py-10 pb-0 lg:pb-10 flex flex-col justify-center items-center gap-4'>
    <h1 class='text-center text-2xl lg:text-4xl font-bold'>Annuaire NWS</h1>
<form class='flex flex-col justify-center items-center' action="#" method="post">
    <label class='hidden' for="search">Recherche de contact :</label>
    <div class="mb-3 w-[20rem] lg:w-[40rem]">
  <div class="relative mb-4 flex w-full flex-wrap items-stretch">
    <input
      type="search"
      class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:text-neutral-700 focus:outline-none"
      placeholder="Search"
      aria-label="Search"
      name="search"
      autocomplete='off' />

    <button
      class="relative flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white border-2 border-l-0 border-neutral-300 transition duration-150 ease-in-out hover:bg-primary-700 focus:bg-primary-700 focus:outline-none focus:ring-0 active:bg-primary-800"
      type="submit"
      >
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </div>
</div>
</form>
</div>



