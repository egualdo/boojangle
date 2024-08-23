


<style>

        .rounded{
            border-radius:25px !important;
            
        }
 
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
            border: 0px;
        }
 
        .input-icons i {
            position: absolute;
        }
 
        .icon {
            padding: 10px;
            color: gray;
            min-width: 50px;
            text-align: center;
        }
 
        .input-field {
            width: 100%;
            padding: 1%;
            text-align: center;
        }
</style>

<section style="    margin-top: 5%;
    background-color: black;
    z-index: 9999999999 !important;
    position: relative;" >
@if ($orders !== null && $orders->count() > 0)
    <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card rounded">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label style="    font-size: 1.25rem;
                                                        padding-bottom: 0.5rem;
                                                        font-weight: bold;">Resultados</label>
                                                <select class="rounded form-control" id="weeks" style="    border: 2px solid black;
                                                            border-radius: 11px !important;
                                                            font-weight: bolder;
                                                        " >
                                                        @foreach ($semanas as $week )
                                                            <option value="{{$week}}">{{$week}}</option>
                                                        @endforeach
                                                    <!--<option value="0">Totales</option>-->
                                                  
                                                </select>

                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">

                                    <label></label>
                                    <div class="input-icons">
                                      

                                        <i class="fa fa-search icon"></i>
                                        <input class="form-control input-field rounded" type="text" id="keyword" style="    border: 2px solid black;
    border-radius: 11px !important;
    font-weight: bolder;
" placeholder="Search">
                                    </div>
                                                {{-- <input type="text" class="form-control" id="search" placeholder="Search"/> --}}
                                              
                                    </div>
                                </div>
                                <br>
                               <div class="row min-750 ml-0 mt-0 pt-1" style="z-index:999999" id="orders_view"></div>
                        </div>

                    </div>
                </div>        
                <div class="col-md-1"></div>
            </div>
    </div>
   
@else
<p>No se encontraron modulos</p>
@endif
</section>

<script>
    $('.select2').select2();
    var weeks=$('#weeks').val();
    var keyword=$('#keyword').val();

    $(function() {
                    ajaxFilterProjectView();
    });

    $(document).on('keyup', '#keyword', function () {
            ajaxFilterProjectView($('#weeks').val(), $(this).val());
    });

    $(document).on('change', '#weeks', function () {
                ajaxFilterProjectView($(this).val(),$('#keyword').val());              
    });

     function ajaxFilterProjectView(weeks='', keyword = '')
      {
            weeks = $('#weeks').val()
            keyword=$('#keyword').val()
            
            var mainEle = $('#orders_view');
            var view = 'list';
            var data = {
                view: view,
                week: weeks,
                keyword: keyword,
            }
            currentRequest = $.ajax({
                url: '{{ route('filter.orders.view') }}',
                data: data,
                success: function (data) {
                   
                    mainEle.html(data.html);
                  
                }
            });
        }
</script>

   