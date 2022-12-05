$('#menu-btn').click(() => {
    $('#menu').toggleClass('active');
})

$(document).ready(function () {
    $(document).on('click','#hapus',function (e) {
        e.preventDefault();
        var data=$(this).data('a');
        var url=$(this).attr('href');
        var confirm=window.confirm("Apakah anda ingin mengahapus data "+data+" ?");
        if (confirm==true){
            $.ajax({
                type:'GET',
                url:url,
                dataType:'JSON',
                cache:false,
                success:function (e) {
                    if (e=='success'){
                        alert('berhasil hapus data!');
                        setTimeout(function () {
                            location.reload();
                        },100);
                    }else{
                        alert('Gagal Hapus data'+e);
                    }
                }
            });
        }else{
            return false;
        }
    });
    $('a#out').click(function () {
        var confirm=window.confirm("Apakah anda ingin keluar ?");
        if (confirm == true){
            return true;
        }else{
            return false;
        }
    });
    $('form#form').on('submit',function (e) {
        e.preventDefault();
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.ajax({
            url:url,
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend:function(){
                $("#buttonsimpan").html("process..");
                $("input,#buttonsimpan,#buttonreset").attr('disabled',true);
            },
            success:function (e) {
                if (e=='success'){
                    setTimeout(function () {
                        window.location.href=e;
                    },100);
                }else if (e=='ada data'){
                    alert('Data tidak Boleh sama!');
                    setTimeout(function () {
                        location.reload();
                    },100);
                }else if (e=='failed'){
                    alert('Gagal Memasukan data!');
                    setTimeout(function () {
                        location.reload();
                    },100);
                }else{
                    window.location.href=e;
                }
            }
        })
    })
    $('form#formlogin').on('submit', function(event) {
        event.preventDefault();
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.ajax({
            url:url,
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend:function(){
                $("#buttonsimpan").html("process..");
                $("input,#buttonsimpan,#buttonreset").attr('disabled',true);
            },
            success:function(e){
                if (e=='success') {
                    location.reload();
                }else{
                    $('#value').html(e);
                        $('#alert').slideDown('slow', function() {
                        setTimeout(function () {
                            location.reload();
                        },1500);
                    });
                }
            }
        });
    });
    function getCookieData(){
        var data=getCookie("pilih");
        if (data==null && data=="") {
            return false;
        }else{
            return true;
        }
    }
    $('button#btn-dropdown').attr('disabled', true);
})

$('form#formlogin').on('submit', function(event) {
    event.preventDefault();
    var url=$(this).attr('action');
    var data=$(this).serialize();
    $.ajax({
        url:url,
        data:data,
        dataType:'JSON',
        type:'POST',
        beforeSend:function(){
            $("#buttonsimpan").html("process..");
            $("input,#buttonsimpan,#buttonreset").attr('disabled',true);
        },
        success:function(e){
            if (e=='success') {
                window.location.href="http://spk-saw-fred.test/index.php";
            }else{
                $('#value').html(e);
                    $('#alert').slideDown('slow', function() {
                    setTimeout(function () {
                        location.reload();
                    },1500);
                });
            }
        }
    });
});