<?php
require_once "config.php";

$total = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $total = trim($_POST['total']);

    $sql = "INSERT INTO menu (total) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_total);

        // Set these parameters
        $param_total = $total;
        
          // Try to execute the query
          if (mysqli_stmt_execute($stmt))
          {
              header("location: home.php");
          }
          else{
              echo "Something went wrong... cannot redirect!";
          }
          mysqli_stmt_close($stmt);
         
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>menu page</title>
  <link rel="stylesheet" href="menu.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</head>
<body>
  <header>
    <div class="nav">

      <a href="#" class="logo">
        <ion-icon name="fast-food"></ion-icon>
        OUR MENU
      </a>
<a href="home.php" class="logo">
        <ion-icon name=""></ion-icon>
        🏘️Home
      </a>
      <div class="box">
        <div class="cart-count">0</div>
        <ion-icon name="cart"  id="cart-icon" ></ion-icon>
      </div>
<form action="confirmorder.php" method="get">
      <div class="cart">
        <div class="cart-title">Cart Items</div>
        <div class="cart-content">
<!--
          <div class="cart-box">
            <img src="images/97.jpg" class="cart-img">
            <div class="detail-box">
              <div class="cart-food-title">Special Dosai</div>
              <div class="price-box">
                <div class="cart-price">Rs.72</div>
                 <div class="cart-amt">Rs.72</div>
             </div>
              <input type="number" value="1" class="cart-quantity">
            </div>
            <ion-icon name="trash" class="cart-remove"></ion-icon>
          </div>

          <div class="cart-box">
            <img src="images/97.jpg" class="cart-img">
            <div class="detail-box">
              <div class="cart-food-title">Special Dosai</div>
              <div class="price-box">
                <div class="cart-price">Rs.72</div>
                 <div class="cart-amt">Rs.72</div>
             </div>
              <input type="number" value="1" class="cart-quantity">
            </div>
            <ion-icon name="trash" class="cart-remove"></ion-icon>
          </div>
        -->
        </div>
<div class="total">
  <div class="total-title">Total</div>
  <div class="total-price">Rs.0</div>
   <input type="hidden" name="total-price" id="total-price">
</div>
<script>
  function setTotalPrice() {
    // Get the value of the div
    var totalPrice = document.querySelector('.total-price').innerHTML;

    // Set the value of the hidden input field
    document.getElementById('total-price').value = totalPrice;
  }
</script>

   
        
     <a href="confirmorder.php"><button  onclick="setTotalPrice()" type="submit" class="btn-buy">Place Order</button></a>
</form>
      <ion-icon name="close" id="cart-close"></ion-icon>
      </div>
    </div>
  </header>
  <div class="container">
    <h2 class="title">Discover the Best</h2>
    <div class="shop-content">


      <div class="food-box">
        <div class="pic">
          <img src="menucoldbrew.png" class="food-img"> </div>
        <h2 class="food-title">Cold Brew Coffee</h2>
        <span class="food-price">Rs.50</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>


      <div class="food-box">
        <div class="pic"><img src="menupumpkincream.png" class="food-img"></div>
        <h2 class="food-title">Pumpkin Cream Cold Brew</h2>
        <span class="food-price">Rs.70</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="menupeppermint.png" class="food-img"></div>
        <h2 class="food-title">Peppermint Mocha</h2>
        <span class="food-price">Rs.80</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="menucappuccino.png" class="food-img"></div>
        <h2 class="food-title">Cappuccino</h2>
        <span class="food-price">Rs.100</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="menuflatwhite.png" class="food-img"></div>
        <h2 class="food-title">Flat White</h2>
        <span class="food-price">Rs.60</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="menulatte.png" class="food-img"></div>
        <h2 class="food-title"> Latte Macchiato</h2>
        <span class="food-price">Rs.90</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
  
      <div class="food-box">
        <div class="pic"><img src="menucaffeeamericano.png" class="food-img"></div>
        <h2 class="food-title">Caffè Americano</h2>
        <span class="food-price">Rs.85</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
  
      <div class="food-box">
        <div class="pic"><img src="menudoppio.png" class="food-img"></div>
        <h2 class="food-title">Doppio</h2>
        <span class="food-price">Rs.65</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menufrenchtoast.png" class="food-img"></div>
        <h2 class="food-title">French Toast</h2>
        <span class="food-price">Rs.150</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menupancake.png" class="food-img"></div>
        <h2 class="food-title">Pancake</h2>
        <span class="food-price">Rs.180</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menuomelette.png" class="food-img"></div>
        <h2 class="food-title">Omelette</h2>
        <span class="food-price">Rs.100</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menuburrito.png" class="food-img"></div>
        <h2 class="food-title">Breakfast burrito</h2>
        <span class="food-price">Rs.140</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menuavocado.png" class="food-img"></div>
        <h2 class="food-title">Avocado toast</h2>
        <span class="food-price">Rs.130</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menusamosa.png" class="food-img"></div>
        <h2 class="food-title">Samosa</h2>
        <span class="food-price">Rs.20</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menudosa.png" class="food-img"></div>
        <h2 class="food-title">Dosa</h2>
        <span class="food-price">Rs.60</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menusandwich.png" class="food-img"></div>
        <h2 class="food-title">Sandwich</h2>
        <span class="food-price">Rs.80</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menuchocolatepastry.png" class="food-img"></div>
        <h2 class="food-title">Chocolate pastry</h2>
        <span class="food-price">Rs.120</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menustrawberrypastry.png" class="food-img"></div>
        <h2 class="food-title">Strawberry pastry</h2>
        <span class="food-price">Rs.120</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menuchocolatemilkshake.png" class="food-img"></div>
        <h2 class="food-title">Chocolate Milkshake</h2>
        <span class="food-price">Rs.130</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

      <div class="food-box">
        <div class="pic"><img src="menudryfruitsmilkshake.png" class="food-img"></div>
        <h2 class="food-title">Dryfruits Milkshake</h2>
        <span class="food-price">Rs.150</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>

    </div>
  </div>
  <script>
    const btnCart=document.querySelector('#cart-icon');
const cart=document.querySelector('.cart');
const btnClose=document.querySelector('#cart-close');

btnCart.addEventListener('click',()=>{
  cart.classList.add('cart-active');
});

btnClose.addEventListener('click',()=>{
  cart.classList.remove('cart-active');
});

document.addEventListener('DOMContentLoaded',loadFood);

function loadFood(){
  loadContent();

}

function loadContent(){
  //Remove Food Items  From Cart
  let btnRemove=document.querySelectorAll('.cart-remove');
  btnRemove.forEach((btn)=>{
    btn.addEventListener('click',removeItem);
  });

  //Product Item Change Event
  let qtyElements=document.querySelectorAll('.cart-quantity');
  qtyElements.forEach((input)=>{
    input.addEventListener('change',changeQty);
  });

  //Product Cart
  
  let cartBtns=document.querySelectorAll('.add-cart');
  cartBtns.forEach((btn)=>{
    btn.addEventListener('click',addCart);
  });

  updateTotal();
}


//Remove Item
function removeItem(){
  if(confirm('Are Your Sure to Remove')){
    let title=this.parentElement.querySelector('.cart-food-title').innerHTML;
    itemList=itemList.filter(el=>el.title!=title);
    this.parentElement.remove();
    loadContent();
  }
}

//Change Quantity
function changeQty(){
  if(isNaN(this.value) || this.value<1){
    this.value=1;
  }
  loadContent();
}

let itemList=[];

//Add Cart
function addCart(){
 let food=this.parentElement;
 let title=food.querySelector('.food-title').innerHTML;
 let price=food.querySelector('.food-price').innerHTML;
 let imgSrc=food.querySelector('.food-img').src;
 //console.log(title,price,imgSrc);
 
 let newProduct={title,price,imgSrc}

 //Check Product already Exist in Cart
 if(itemList.find((el)=>el.title==newProduct.title)){
  alert("Product Already added in Cart");
  return;
 }else{
  itemList.push(newProduct);
 }


let newProductElement= createCartProduct(title,price,imgSrc);
let element=document.createElement('div');
element.innerHTML=newProductElement;
let cartBasket=document.querySelector('.cart-content');
cartBasket.append(element);
loadContent();
}


function createCartProduct(title,price,imgSrc){

  return `
  <div class="cart-box">
  <img src="${imgSrc}" class="cart-img">
  <input type="text" name="title[]" hidden value="${title}" >
  <input type="text" name="price[]" hidden value="${price}" >

  <div class="detail-box">
    <div class="cart-food-title"> ${title}</div>
    <div class="price-box">
      <div class="cart-price">${price}</div>
       <div class="cart-amt">${price}</div>
   </div>
    <input type="number" name="count[]" value="1" class="cart-quantity">
  </div>
  <ion-icon name="trash" class="cart-remove"></ion-icon>
</div>
  `;
}

function updateTotal()
{
  const cartItems=document.querySelectorAll('.cart-box');
  const totalValue=document.querySelector('.total-price');

  let total=0;

  cartItems.forEach(product=>{
    let priceElement=product.querySelector('.cart-price');
    let price=parseFloat(priceElement.innerHTML.replace("Rs.",""));
    let qty=product.querySelector('.cart-quantity').value;
    total+=(price*qty);
    product.querySelector('.cart-amt').innerText="Rs."+(price*qty);

  });

  totalValue.innerHTML='Rs.'+total;


  // Add Product Count in Cart Icon

  const cartCount=document.querySelector('.cart-count');
  let count=itemList.length;
  cartCount.innerHTML=count;

  if(count==0){
    cartCount.style.display='none';
  }else{
    cartCount.style.display='block';
  }


}
  </script>
</body>
</html>