
    $(document).ready(function () {
        loadData();
    });
    function loadData(){
        $("#comp_result").html(compResult());
        Marked();
    }

    $(document).on("click","#comp",function(){
        var pID = $(this).data('id');
        var img = $(this).data('img');
        var title = $(this).data('name');
        addCart(pID,img,title);
        loadData();
        $("#compare").addClass('show');
    });

    let storage = [];
    let getItem = null;
    function addCart(pid,img,title){
        var data = '';
        data = [{
            pid:pid,
            img:img,
            title:title
        }];
        var exists = localStorage.getItem('compare');

        if(!exists){
            localStorage.setItem('compare',JSON.stringify(data));
        }else{
            var items = [];
            var x = 0;
            items = JSON.parse(localStorage.getItem('compare'));
            if(items.length>2) x = 1;

            (items).forEach((dataItem,index)=>{
                if (dataItem.pid == pid)
                    x = 1;
            });
            if(x !=1){
                items.push(data[0]);
                localStorage.setItem('compare',JSON.stringify(items));
            }
        }
        return localStorage.getItem('compare');
    }

    function compResult(data){
        var html = '';
        var compare = localStorage.getItem('compare');

        if (!compare){
            return '<div class="list-group-item card bg-transparent">' +
            '<div class="position-relative hover-change-image bg-hover-overlay">' +
            'No Selected Property For Comparison' +
            '<div class="card-img-overlay">';
        }else {
            var data = JSON.parse(compare);
            (data).forEach((item, idx) => {
                html +=
                    '<input type="hidden" name="id[]" value="'+item.pid+'">' +
                    '<div class="list-group-item card bg-transparent">' +
                    '   <div class="position-relative hover-change-image bg-hover-overlay">' +
                    '       <img src="' + item.img + '" class="card-img img-fluid" alt="properties" style="min-height: 65px">' +
                    '       <div class="card-img-overlay">' +
                    '           <span class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2" data-id="'+idx+'" id="RemovePid">' +
                    '               <i class="fal fa-minus-circle"></i>' +
                    '           </span>' +
                    '       </div>' +
                    '   </div>' +
                    '</div>';
            });
            if (data.length >1){
                html+='<div class="list-group-item bg-transparent">'+
                '<button type="submit" class="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center" id="comparison">Compare</button>'+
                '</div>';
            }
        }
        return html;
    }

    $(document).on("click","#RemovePid",function(){
        var id = $(this).data('id');
        removeItem(id);
        loadData();
    });

    function removeItem(id){
        var compare = localStorage.getItem('compare');
        var parse = JSON.parse(compare);
        var status = 'comp';
        (parse).forEach((item, idx) => {
            if(idx === id)
                removeCheck(item.pid, status);
        });
        parse.splice(id,1);
        if (parse.length === 0)
            removeCart(status);
        else
            localStorage.setItem('compare',JSON.stringify(parse));
        loadData();
    }

    $(document).on("click","#fav",function(){
        var pID = $(this).data('id');
        addFav(pID);
        Marked();
    });

    function addFav(pid){
        var data ='';
        data = [{
            pid:pid,
        }];
        var check = localStorage.getItem('fav');

        if(!check){
            localStorage.setItem('fav',JSON.stringify(data));
        }else{
            var x = 0;
            var favs = JSON.parse(localStorage.getItem('fav'));

            (favs).forEach((item,index)=>{
                if (item.pid === pid){
                    x = 1;
                    removeFav(index,pid);
                }
            });
            if(x === 0){
                favs.push(data[0]);
                localStorage.setItem('fav',JSON.stringify(favs));
            }
        }
        return localStorage.getItem('fav');

    }

    function removeFav(idx,pid){
        var fav = localStorage.getItem('fav');
        var favItem = JSON.parse(fav);
        var status = 'fav';

        removeCheck(pid, status);
        favItem.splice(idx,1);
        if (favItem.length === 0)
            removeCart(status);
        else
            localStorage.setItem('fav',JSON.stringify(favItem));
        loadData();
        console.log(localStorage.getItem('fav'));
    }

    function removeCart(state){
        if(state === 'comp')
            localStorage.removeItem('compare');
        if(state === 'fav')
            localStorage.removeItem('fav');
        loadData();
    }

    function removeCheck(id, status){
        if(status === 'comp'){
            $(".marked"+id).removeClass('checked');
        }
        if (status === 'fav') {
            $(".fav"+id).removeClass('checked');
        }
    }

    function Marked(){
        var compare = '';
        compare = localStorage.getItem('compare');
        var fav = '';
        fav = localStorage.getItem('fav');
        var item = '';
        var favs = '';
        if(compare){
            item = JSON.parse(compare);
            (item).forEach((data,index)=>{
                $(".marked"+data.pid).addClass('checked');
            });
        }
        if(fav){
            favs = JSON.parse(fav);
            (favs).forEach((data,index)=>{
                $(".fav"+data.pid).addClass('checked');
            });
        }
    }

    $('.alert-fade').fadeOut(10000);
    $(function(){
        $('.datepicker').datepicker({autoclose:true});
    });

    $(function(){
        $('.timepicker').timepicker({showMeridian: false,});
    });
