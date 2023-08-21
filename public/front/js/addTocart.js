$(document).ready(function(){
    itemCount();
    getItem();
    $(".product_actions").on('click','.addTocart',function(){
        // alert("Hello Alert");

        let id =$(this).data('id');
        let name = $(this).data('name');
        let image =$(this).data('image');
        let price = $(this).data('price');
        let discount = $(this).data('discount');
        let qty= $('.qty').val();

        console.log(id,name,image,price,discount);

        let items={

            id : id,
            name :name,
            image : image,
            price : price,
            discount : discount,
            qty : qty
        }

        // console.log(items);

        let itemString = localStorage.getItem('hayzelShop_items');
        let itemArray;

        if(itemString == null){
            itemArray = [];
        }else{

            itemArray = JSON.parse(itemString);
        }

        let status = false;
        $.each(itemArray,function(i,v){
            if (id == v.id){
                status = true;
                v.qty = Number(v.qty)+Number(qty);
            }
        })

        if(status == false){

            itemArray.push (items);

       
        }

        let itemData = JSON.stringify(itemArray);
        localStorage.setItem('hayzelShop_items',itemData);

        
  
    });

    // Increase quantity
    $('#cartTbody').on('click', '.increaseQty', function() {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let qtyElement = row.find('.qty');
        let currentQty = parseInt(qtyElement.text());

        qtyElement.text(currentQty + 1);
        updateCartItemQuantity(id, currentQty + 1);
        updateCartTotal();
    });

    // Decrease quantity
    $('#cartTbody').on('click', '.decreaseQty', function() {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let qtyElement = row.find('.qty');
        let currentQty = parseInt(qtyElement.text());

        if (currentQty > 1) {
            qtyElement.text(currentQty - 1);
            updateCartItemQuantity(id, currentQty - 1);
            updateCartTotal();
        }
    });


    function itemCount(){

        let itemString = localStorage.getItem('hayzelShop_items');

        if(itemString){
            let itemArray =JSON.parse(itemString);
            if(itemString){

                if(itemArray !=0){
    
                    let count = itemArray.length;
                    $('#itemCount').text(count);
                }else{
                    $('#itemCount').text(0);
                }
            }
    
        }
    }


    // get data

    function getItem(){

        let itemString = localStorage.getItem('hayzelShop_items');

        if(itemString){
            let itemArray =JSON.parse(itemString);
            let data = '';
            let total=0;

            $.each(itemArray,function(i,v){

                let amount = v.price - ((v.discount/100) * v.price)
                data += `<tr class="text-center">
                            <td><img src="${v.image}" class="img-fluid w-25 h-25" ></td>
                            <td>${v.name}</td>
                            <td>${v.price}MMK</td>
                            <td>${v.discount}%</td>
                            <td>
                               
                                <button class="btn btn-sm btn-danger decreaseQty">-</button>

                                &nbsp;
                                
                                <span class="qty">${v.qty}</span><br>
                                <button class="btn btn-sm btn-danger increaseQty">+</button>
                            </td>
                            <td>${v.qty * amount}MMK</td>
                         </tr>`
                         total += Number(v.qty * amount);
            })

            data += `<tr>
                <td colspan="5" class="text-center">Total</td>
                <td>${total}</td>
            </tr>`;

            $('#cartTbody').html(data);
        }


    }

    function updateCartItemQuantity(id, newQty) {
        let itemArray = JSON.parse(localStorage.getItem('hayzelShop_items'));

        $.each(itemArray, function(i, v) {
            if (id == v.id) {
                v.qty = newQty;
            }
        });

        let itemData = JSON.stringify(itemArray);
        localStorage.setItem('hayzelShop_items', itemData);
    }

    // Function to update the cart total
    function updateCartTotal() {
        // ... Calculate and update the cart total ...
    }
});

    

