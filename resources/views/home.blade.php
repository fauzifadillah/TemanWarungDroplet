<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>TemanWarung</title>
  <link rel="icon" href="{{ asset('/tw.png') }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- {{-- CSRF TOKEN --}} -->
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
{{-- CSS SORANGAN --}}
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
</head>
    
{{-- Header --}}
<div class="row mx-0 header-section">
  {{-- Logo TemanWarung --}}
  <div class="col-auto py-0 pl-4 mr-auto">
    <img width="75" src="{{ asset('/twputih.png') }}">
  </div>
  {{-- User Info --}}
  <div class="col-auto py-0 pl-4 ml-auto">
    <img width="75" src="{{ asset('/twputih.png') }}">
  </div>
</div>
{{-- End of Header --}}
  <div class="container">
    
    <div class="row container-content">
      <div class="col-lg-12">
        <div class="card" >
          <div class="card-body">
            <table id="table" class="" style="width:100%">
            <tbody>
              @foreach($model as $a)
              @if($a->id%3==0)
                <td class="text-center">
                  <a href="{{route('detail',$a->id)}}" class="image-detail" id="{{($a->id)/3}}" name="{{$a->id}}"><img src="{{ asset($a->image) }}" width="200" height="200"/></a>
                </td>
              </tr>
              @elseif($a->id%3==1)
              <tr id="{{($a->id+2)/3}}">
                <td class="text-center">
                  <a href="{{route('detail',$a->id)}}" class="image-detail" id="{{($a->id+2)/3}}" name="{{$a->id}}"><img src="{{ asset($a->image) }}" width="200" height="200"/></a>
                </td>
              @else
                <td class="text-center">
                  <a href="{{route('detail',$a->id)}}" class="image-detail" id="{{($a->id+1)/3}}" name="{{$a->id}}"><img src="{{ asset($a->image) }}" width="200" height="200"/></a>
                </td>
              @endif
              @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- jQuery -->
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- Sweet Alert 2 -->
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
@include('layouts.modal')
<script>
  $('body').on('click', '.modal-show', function(event){
    event.preventDefault();

    var url = $(this).attr('href');

    $.ajax({
      url: url,
      dataType: 'html',
      success: function (response) {
        $('#modal-body').html(response);
      }
    });

    $('#modal').modal('show');
  });

  $('body').on('submit','.form', function(event){
    event.preventDefault();

    var me = this,
        form = $('.form'),
        url = form.attr('action'),
        method = form.attr('method'),
        name = form.attr('id');

    $.ajax({
      url : url,
      type : "POST",
      data: new FormData(me),
      dataType: 'JSON',
      contentType: false,
      processData: false,
      success: function(response){
        $('#modal').modal('hide');

        swal({
          title: "Apakah kamu yakin ingin membeli '"+name+"'?",
          text: "Setelah ini kamu akan kembali ke WhatsApp TemanWarung",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK, saya yakin!',
          cancelButtonText: 'Gak jadi!'

        }).then((result)=>{
          if(result.value){
            $.ajax({
              url: '{{ route('save') }}',
              type : "POST",
              data: new FormData(me),
              dataType: 'JSON',
              contentType: false,
              processData: false,
              success: function(response){
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  background: '#28A746',
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })
		var link = "https://api.whatsapp.com/send?phone=6281223724920";
                window.open(link,'newStuff'); //open's link in newly opened tab!
                Toast.fire({
                  type: 'success',
                  text: 'Sukses!'
                })
                // TO BE DETERMINED --OJOY
                $.ajax('https://api.whatsapp.com/send?phone=6281312630599/', {
			"headers": {
                        "accept": "application/json",
                        "Access-Control-Allow-Origin":"*"
                    },
		    crossDomain: true,
		    dataType: 'jsonp',
                    data: JSON.stringify({
                    }),
                    contentType: 'application/json',
                    type: 'POST'
                  });
              },
              error: function(xhr){
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Maaf sistem dalam perbaikan'
                });
              }
            });
          }
        });
      },
      error: function(xhr){
        var res = xhr.responseJSON;
        if ($.isEmptyObject(res) == false) {
          form.find('.invalid-feedback').remove();
          form.find('.is-invalid').removeClass('is-invalid');
          $.each(res.errors, function (key, value) {
            $('#' + key)
              .addClass('is-invalid')
              .after('<div class="invalid-feedback d-block">'+value+'</div>');
          });
        };
      }
    });
  });

  $('.image-detail').on('click', function(){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        id = me.attr('id'),
        name = me.attr('name'),
        tr = me.closest('tr'),
        td = tr.next('tr');
    $.ajax({
      url: url,
      dataType: 'html',
      success: function (response){
        if (tr.hasClass('shown'+id)){
          if(td.hasClass('image'+name)){
            tr.removeClass('shown'+id);
            td.remove()
          }
          else{
            td.remove()
            tr.after(response);
        td.html('coba');
          }
        }
        else{
          tr.addClass('shown'+id).after(response);
        }
      }
    });
  });
</script>
</body>
</html>
