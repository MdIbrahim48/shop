

function addCart(){
    var qty = document.getElementById('qty').value;
    var productId = document.getElementById('productId').value;
    let product = {
        "products":[
          {"productId":productId, "qty":qty}
        ]
    };
    localStorage.setItem(['qty','productId'])
}