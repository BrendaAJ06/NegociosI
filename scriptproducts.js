let http = new XMLHttpRequest();
http.open('get', 'productos.json', true);
http.send();
http.onload = function(){
   if(this.readyState == 4 && this.status == 200){
      let products = JSON.parse(this.responseText);
      let output = "";
      for(let item of products){
         output += `
            <div class="product">
               <img src="${item.image}" alt="${item.description}">
               <p class="title">${item.producto}</p>
               <p class="description">${item.descripcion}</p>
               <p class="price">
                  <span>$ ${item.precio}</span>
                  <span>pesos</span>
               </p>
               <a href="sproduct.html"><i class="cart">Add to cart <i class="bx bx-cart-alt"></i></a>
            </div>
         `;
      }
      document.querySelector(".productaciones").innerHTML = output;
   }
}