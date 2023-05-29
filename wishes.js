// Obtener el enlace de la wishlist por su ID
var wishlistLink = document.getElementById('wishlist-link');

// Agregar un evento de clic al enlace
wishlistLink.addEventListener('click', function(event) {
  event.preventDefault(); // Evitar el comportamiento predeterminado del enlace

  // Aquí puedes realizar acciones adicionales, como mostrar una ventana emergente, redirigir a una página de wishlist, etc.
  // Por ejemplo, mostrar un mensaje en la consola
  console.log('¡Has hecho clic en la wishlist!');
});
