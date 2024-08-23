<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">
<section class="seccion-servicios">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2>Data Research</h2>
                </div>
            </div>
            
            <div class="col-12 herramientas">
                <div class="row">
                    @foreach ($dataResearch as $dt )
                        <div class="col-lg-4 herramientas-cont">
                            <div class="img-herramientas">
                            <button style="border: none;outline:none" id="{{'a_'.$dt->id}}"
                                {{$dt->file !== null ? 'onclick='.'handlePhoto(event)' : ''}}
                             >
                                <img src="{{$dt->photo}}" id="{{'photo_'.$dt->id}}" {{$dt->file !== null ? 'data-href='.$dt->file : ''}}>
                            </button>
                            </div>
                            {!! $dt->description !!}
                            
                        </div>
                    @endforeach
                </div>
            </div>
            
           
        </div>
    </div>
</section>
<script>
    function handlePhoto(e){
            e.stopPropagation()
            const clicked=e.target.id;
            const getItem=localStorage.getItem(clicked);
            const href=e.target.getAttribute("data-href");

            const anchor = document.createElement("a")
            anchor.href = href;

            if(getItem !== undefined && getItem !== null && getItem !== ''){    
                const oldvalue = JSON.parse(getItem).count;
                const value=oldvalue;
                const updated=value+1;
                
                if(updated >= 4){
                    document.getElementById('')
                    alert('no puedes descargar mas veces')
                    return
                }
                
                localStorage.setItem(clicked, JSON.stringify({name: clicked, count: updated}));
                anchor.click()
            }else{
                localStorage.setItem(clicked, JSON.stringify({name: clicked, count: 1}));
                anchor.click()
            }
    }
</script>