<nav class="z-[99999] w-screen flex items-center h-16 md:px-20 bg-white shadow fixed">
    <div class="hidden md:flex gap-12 uppercase text-sm font-bold">
        <a href="./">annuaire</a>
        <a href="./?page=auth">s'enregistrer</a>
        <a href="./?page=admin">gestionnaire</a>
    </div>
    <div class="md:hidden flex items-center">
        <button id="menuToggle" class="z-[99999] text-3xl text-black focus:outline-none ml-6">
            <i class="fa-solid fa-bars"></i>
        </button>
        <ul id="mobileMenu"
            class="hidden w-screen h-screen flex-col space-y-2 pt-16 pl-6 bg-white border shadow absolute top-0 py-2">
            <li><a href="./">annuaire</a></li>
            <li><a href="./?page=auth">s'enregistrer</a></li>
            <li><a href="./?page=admin">gestionnaire</a></li>
        </ul>
    </div>
</nav>

<script>
const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');

menuToggle.addEventListener('click', () => {
    if (mobileMenu.style.display === 'block') {
        mobileMenu.style.display = 'none';
    } else {
        mobileMenu.style.display = 'block';
    }
});
</script>