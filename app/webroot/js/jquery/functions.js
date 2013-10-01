$(document).ready(function() {
  
    $('.product_money').priceFormat();
                     
    
    $('#btn_up').click(function(){
        $('#marquees').attr('direction','up');
    });
    $('#btn_down').click(function(){
        $('#marquees').attr('direction','down');
    });
    
    $('.p_moinhat').mouseover(function(){
        $('#marquees').attr('scrollamount','0');        
    }).mouseout(function(){$('#marquees').attr('scrollamount','3')});
    
    
/*---------Fly jquery function-------------*/
        // for add item to cart
    $('[rel=addToCart]').click(function(){
        var $this = $(this);
        var id = $(this).attr('id');
        flyToCart(id, function() {
            
            addToCart($this);
        })
        return false;
    });
    // event drag - drop
    $('[rel=addToCart] img').draggable({
        containment: 'document',
        opacity: 0.6,
        revert: 'invalid',
        helper: 'clone',
        zIndex: 100
    });
    $("#cart").droppable({
        drop: function(e, ui) {
            addToCart($(ui.draggable).parent());
        }
    });

    function addToCart (_seft) {
        var _url = _seft.attr('href');
        $.ajax({
            url: _url,
            type: 'get',
            dataType: 'json',
            beforeSend: function (){
                _seft.parent().parent().find('.busy').show();
            },
            success: function(db) {
                _seft.parent().parent().find('.busy').hide();
                $('#cart').html(db.list);
                //$('#totalPrice').html(db.price);
            }
        });
    }

    // fly to cart when user click to product item
    function flyToCart (id, fn)
    {
            //var itemImgObj  = $this.children('img'),
            var itemImgObj  = $('#img_'+id);
               
            cartOffsetX = $('#cart').offset().left - itemImgObj.offset().left+50, // offset top of cart
            cartOffsetY = $('#cart').offset().top - itemImgObj.offset().top + $('#cart').height()/2 -20; // offset top of cart
            //return false;

        $("#p_cart_img_"+id).prepend('<img class="p_img_fly" src="' + itemImgObj.attr('src') + '" id="itemFly" />');
        $('#itemFly')
            .css({'position' : 'absolute', zIndex: '999999'})
            .animate({opacity: 0.6}, 100 )
            .animate({
                opacity: 0.1,
                marginLeft: cartOffsetX,
                marginTop: cartOffsetY,
                width: itemImgObj.width()-30+'px', 
                height: itemImgObj.height()-20+'px',
            }, 600, function(){
                $(this).remove();
                if(typeof fn == 'function') { fn(); } // if fn is the function, then calling it
            });
        ;
    }
    /* .......................................................................... */
    // for remove all cart
    $('[rel=removeAllCart]').click(function(){
        var _seft = $(this);
        var url = _seft.attr('href');
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'html',
            beforeSend: function (){
                _seft.parent().parent().parent().find('.busy').show();
            },
            success: function(db) {
                _seft.parent().parent().parent().find('.busy').hide();
                $('#totalItems').html('0');
                $('#totalPrice').html('$0');
            }
        });
        return false;
    });
/*---------END Fly jquery function-------------*/    
      
                    
});

function del_sp_cart(product_id){
    var _seft = $(this);
        var url = base_url+'products/dell_pro_cart/'+product_id;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            beforeSend: function (){
                _seft.parent().parent().parent().find('.busy').show();
            },
            success: function(db) {
                _seft.parent().parent().parent().find('.busy').hide();
                $('.cart_info_'+product_id).remove();
                $('.cart_item_'+product_id).remove();
                $('#p_cart_total').html(db.price);   
                $('#total_tmp').html(db.total_tmp);
                $('#total_qty').html(db.total_qty);
            }
        });
        return false;    
};

function up_pro_cart(product_id){
    var _seft = $(this);
        var url = base_url+'products/up_pro_cart/'+product_id;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            beforeSend: function (){
                _seft.parent().parent().parent().find('.busy').show();
            },
            success: function(db) {
                _seft.parent().parent().parent().find('.busy').hide();
                $('.cart_info_'+product_id).html(db.row);
                $('.cart_item_'+product_id).html(db.cart);
                $('#p_cart_total').html(db.total);
                $('#total_tmp').html(db.total_tmp);
                $('#total_qty').html(db.total_qty);
            }
        });
        return false;    
};

function down_pro_cart(product_id){
    var _seft = $(this);
        var url = base_url+'products/down_pro_cart/'+product_id;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            beforeSend: function (){
                _seft.parent().parent().parent().find('.busy').show();
            },
            success: function(db) {
                _seft.parent().parent().parent().find('.busy').hide();
                $('.cart_info_'+product_id).html(db.row);
                $('.cart_item_'+product_id).html(db.cart);
                $('#p_cart_total').html(db.total);
                $('#total_tmp').html(db.total_tmp);
                $('#total_qty').html(db.total_qty);
            }
        });
        return false;    
};

function update_pro_cart(product_id,qty){
    var _seft = $(this);
        var url = base_url+'products/update_pro_cart/'+product_id+'/'+qty;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            beforeSend: function (){
                _seft.parent().parent().parent().find('.busy').show();
            },
            success: function(db) {
                _seft.parent().parent().parent().find('.busy').hide();
                $('.cart_info_'+product_id).html(db.row);
                $('.cart_item_'+product_id).html(db.cart);
                $('#p_cart_total').html(db.total);
            }
        });
        return false;    
};

function detail_sp(product_id){
    $.colorbox({href:base_url+"products/view/"+product_id,innerWidth:'800px',innerHeight:'550px',title:'Chi tiết sản phẩm'});  
};

function loadlimit(cid,limit){
        var _seft = $(this);
        var url = base_url+'products/loadlimit/'+cid+'/'+limit;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            beforeSend: function (){
                $('#load_product_cat_'+cid).fadeOut();
            },
            success: function(db) {
                $('#load_product_cat_'+cid).fadeIn();
                $('#load_product_cat_'+cid).html(db.list);
                
            }
        });
        return false;    
}


function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(3);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(3);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};  
