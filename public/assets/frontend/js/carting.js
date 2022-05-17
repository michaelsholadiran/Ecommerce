// Valodator
function toValidate() {
    if ($('input[name="color"]:checked').length == 0) {
        $(".product-form__cart-submit").attr('title', 'Please select all product options').attr('data-original-title', 'Please select all product options')
        $(".shopify-payment-button__button").attr('title', 'Please select all product options').attr('data-original-title', 'Please select all product options')
        return false;
    }
    if ($('input[name="quantity"]').val() == "" || isNaN($('input[name="quantity"]').val()) || $('input[name="quantity"]').val() == 0) {

        $(".product-form__cart-submit").attr('title', 'Please select all product options').attr('data-original-title', 'Please select all product options')
        $(".shopify-payment-button__button").attr('title', 'Please select all product options').attr('data-original-title', 'Please select all product options')
        return false;
    } else {
        $(".product-form__cart-submit").attr('title', '').attr('data-original-title', '')
        $(".shopify-payment-button__button").attr('title', '').attr('data-original-title', '')
        return true;
    }
}

toValidate()


$(".product-form__cart-submit ,.shopify-payment-button__button.btn-lg").mouseover(function() {
    toValidate()
})
$(".shopify-payment-button__button.btn-lg").click(function() {

    if (toValidate()) {
        $('#product_form_10508262282').submit()
        window.location = '/checkout'
    }
})


// });
function qnt_incre() {
    $(".qtyBtn").on("click", function() {
        var qtyField = $(this).parent(".qtyField"),
            oldValue = $(qtyField).find(".qty").val(),
            newVal = 1;

        if ($(this).is(".plus")) {
            newVal = parseFloat(oldValue) + 1;
        } else if (oldValue > 1) {
            newVal = parseFloat(oldValue) - 1;
        }
        $(qtyField).find(".qty").val(newVal);
    });
}

function loadItem(item) {
    var item = `<li class="item">
    <a class="product-image" href="#">
        <img src="${item.image}" alt="3/4 Sleeve Kimono Dress" title="" />
      </a>
      <div class="product-details">
        <span data-id="${item.id}" class="remove"><i class="anm anm-times-l remove" aria-hidden="true"></i></span>
            <a class="pName" href="cart.html">${item.name}</a>
          <div class="variant-cart">${item.color}</div>
          <div class="wrapQtyBtn">
              <div class="qtyField">
                <span class="label">Qty:</span>
                  <a class="quant qtyBtn minus " href="javascript:void(0);"><i class=" quant fa anm anm-minus-r" aria-hidden="true"></i></a>
                  <input type="text" id="${item.id}" name="quantity[]" value="${item.quantity}" class="product-form__input qty">
                  <a class="quant qtyBtn plus" href="javascript:void(0);"><i class=" quant fa anm anm-plus-r" aria-hidden="true"></i></a>
              </div>
          </div>
          <div class="priceRow">
            <div class="product-price">
                <span class="money">$${item.price}</span>
              </div>
           </div>
      </div>
   </li>`
    return item;
}


function getSubTotal() {
    try {
        var getCartDetail = JSON.parse(Cookies.get('cart-details'));
    } catch (errror) {
        var getCartDetail = [];
    }
    var subTotal = 0;
    for (var item in getCartDetail) {
        subTotal += parseFloat(getCartDetail[item].price);
    }
    $('.total .money').html('$' + subTotal.toFixed(2))
}


var price = $('input#price').val()

$('#product_form_10508262282').submit(function(e) {
    e.preventDefault();
    if (toValidate()) {
        // console.log(toValidate);

        var image = $(this).find("[name='color']:checked").val();
        var color = $(this).find("[name='color']:checked").attr('data-color');

        var name = $(this).find("[name='name']").val();
        // var size = parseFloat($(this).find("[name='size']:checked").val());
        var quantity = parseFloat($(this).find("[name='quantity']").val());
        var cartDetails = {
            id: Math.random(),
            product_id: parseFloat($('input#product_id').val()),
            name,
            color,
            // size,
            quantity,
            image,
            price: (parseFloat(quantity) * price).toFixed(2),
            original_price: price
        };
        try {
            var getCartDetail = JSON.parse(Cookies.get('cart-details'));
        } catch (errror) {
            var getCartDetail = [];
        }
        if (getCartDetail.length > 0) {
            var getCartDetail = JSON.parse(Cookies.get('cart-details'));
            var arr = '';
            for (var item in getCartDetail) {
                if (getCartDetail[item].name == cartDetails.name && getCartDetail[item].color == cartDetails.color) {
                    var q = getCartDetail[item].quantity = parseFloat(getCartDetail[item].quantity) + parseFloat(cartDetails.quantity);
                    var pricex = q * price;
                    var p = getCartDetail[item].price = pricex.toFixed(2);

                    arr = [getCartDetail, item]
                    var t = document.getElementById(getCartDetail[item].id).value = q;
                    var moneyParent = document.getElementById(getCartDetail[item].id).parentElement.parentElement.parentElement;

                    moneyParent.querySelector('.money').innerHTML = "$" + p
                }
            }
            if (arr[1]) {
                Cookies.set('cart-details', JSON.stringify(getCartDetail));
            } else {
                Cookies.set('cart-details', JSON.stringify([...getCartDetail, cartDetails]));
                item = loadItem(cartDetails)
                $('.mini-products-list').append(item)

                var getCartDetail = JSON.parse(Cookies.get('cart-details'));
                document.getElementById('CartCount').innerHTML = getCartDetail.length
            }

            getSubTotal()
        } else {
            Cookies.set('cart-details', JSON.stringify([cartDetails]));
            item = loadItem(cartDetails)
            $('.mini-products-list').html(item)
            document.getElementById('CartCount').innerHTML = 1
            $('.site-cart').find('#CartCount').removeClass('d-none')
            getSubTotal()
        }
        // console.log(JSON.parse(Cookies.get('cart-details')));
        qnt_incre();
    }
})

$(function() {

    if (Cookies.get('cart-details') && JSON.parse(Cookies.get('cart-details')).length) {
        $('.mini-products-list').find('p').addClass('d-none')
        $('.site-cart').find('#CartCount').removeClass('d-none')
    } else {
        $('.mini-products-list').find('p').removeClass('d-none')
        $('.site-cart').find('#CartCount').addClass('d-none')
    }

    try {
        var getCartDetail = JSON.parse(Cookies.get('cart-details'));
    } catch (errror) {
        var getCartDetail = [];
    }

    for (var item of getCartDetail) {
        $('.mini-products-list').append(loadItem(item))
    }
    document.getElementById('CartCount').innerHTML = getCartDetail.length

    qnt_incre();


    try {
        var getCartDetail = JSON.parse(Cookies.get('cart-details'));
    } catch (errror) {
        var getCartDetail = [];
    }

    for (var item in getCartDetail) {
        if (getCartDetail[item].quantity == '') {
            var q = getCartDetail[item].quantity = 1;
            var p = getCartDetail[item].price = price;
            var moneyParent = document.getElementById(getCartDetail[item].id).parentElement.parentElement.parentElement;
            document.getElementById(getCartDetail[item].id).value = q
            moneyParent.querySelector('.money').innerHTML = "$" + p

        }
    }

    getSubTotal()

})


var list = document.querySelector('.mini-products-list')
list.onclick = function(e) {
    if (e.target.tagName = "INPUT") {
        e.target.onkeyup = function(e) {
            var value = e.target.value;
            if (isNaN(value) || value == "" || value == 0) {
                value = 1
            }
            var id = e.target.id;


            var getCartDetail = JSON.parse(Cookies.get('cart-details'));

            for (var item in getCartDetail) {
                if (getCartDetail[item].id == id) {
                    var q = getCartDetail[item].quantity = value;
                    var pricex = (q * getCartDetail[item].original_price).toFixed(2)
                    var p = getCartDetail[item].price = pricex;

                    var moneyParent = document.getElementById(getCartDetail[item].id).parentElement.parentElement.parentElement;

                    moneyParent.querySelector('.money').innerHTML = "$" + p

                }
            }
            Cookies.set('cart-details', JSON.stringify(getCartDetail));
            getSubTotal()
        }

        e.target.onblur = function(e) {
            if (isNaN(e.target.value) || e.target.value == "" || e.target.value == 0) {
                var value = 1;
                var id = e.target.id;
                var getCartDetail = JSON.parse(Cookies.get('cart-details'));

                for (var item in getCartDetail) {
                    if (getCartDetail[item].id == id) {
                        var q = getCartDetail[item].quantity = value;
                        var pricex = (q * getCartDetail[item].original_price).toFixed(2)
                        var p = getCartDetail[item].price = pricex;
                        var moneyParent = document.getElementById(getCartDetail[item].id).parentElement.parentElement.parentElement;

                        moneyParent.querySelector('.money').innerHTML = "$" + p
                        document.getElementById(getCartDetail[item].id).value = q;

                    }
                }
                Cookies.set('cart-details', JSON.stringify(getCartDetail));
            }
            getSubTotal()

        }
    }
    if (e.target.classList.contains('quant')) {
        var parent = e.target.parentElement;
        if (parent.tagName == "A") {
            parent = parent.parentElement
        }
        var value = parent.querySelector('input').value
        var id = parent.querySelector('input').id
        var getCartDetail = JSON.parse(Cookies.get('cart-details'));

        for (var item in getCartDetail) {
            if (getCartDetail[item].id == id) {
                var q = getCartDetail[item].quantity = value;
                var pricex = (q * getCartDetail[item].original_price).toFixed(2)
                var p = getCartDetail[item].price = pricex




                var moneyParent = document.getElementById(getCartDetail[item].id).parentElement.parentElement.parentElement;

                moneyParent.querySelector('.money').innerHTML = "$" + p
            }
        }
        Cookies.set('cart-details', JSON.stringify(getCartDetail));

    }
    if (e.target.classList.contains('remove')) {
        var el = e.target;
        if (el.tagName != "A") {
            el = el.parentElement
        }
        var id = el.dataset.id

        var getCartDetail = JSON.parse(Cookies.get('cart-details'));

        var newArr = getCartDetail.filter((e) => {
            return e.id != id;
        });

        e.target.closest('.item').remove()

        document.getElementById('CartCount').innerHTML = newArr.length
        if (newArr.length) {
            $('.mini-products-list').find('p').addClass('d-none')
            $('.site-cart').find('#CartCount').removeClass('d-none')
        } else {
            $('.mini-products-list').find('p').removeClass('d-none')
            $('.site-cart').find('#CartCount').addClass('d-none')
        }

        Cookies.set('cart-details', JSON.stringify(newArr));
    }
    getSubTotal()
}
