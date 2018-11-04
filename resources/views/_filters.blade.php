<div class="col-xs-12">
    <strong onclick="$('#filters').toggleClass('open');" id="open-filters-button">
        Applica filtri
    </strong>
    @if($filter_by_tag)
    <a href="{{url($page)}}" id="remove-filters-button">Rimuovi i filtri</a>
    @endif
</div>

<div id="filters">
    <div class="filter-header col-xs-12">
        <div class="title">
            <img class="svg" src="{{url('public/dist/images/icons/ic_filter.svg')}}" /> Filtri
        </div>
        <div onclick="$('#filters').toggleClass('open');" class="close-filters">Chiudi</div>
        </h5>
    </div>

    <form class="form-inline" id="filters-form" action="{{url($page)}}" method="GET">
        <div class="filter-footer">
            <button type="submit" class="btn btn-sm btn-default">Conferma</button>
        </div>
        <div class="col-sm-12 form-group">
            <ul>
                @foreach($tags as $tag)
                <li onclick="selectTag(this, {{$tag->id}});" class="tag @if($tag->active) active @endif">
                    @if($tag->active)
                    <i class="fas fa-2x fa-fw fa-check-square"></i>
                    @else
                    <i class="far fa-2x fa-fw fa-square"></i>
                    @endif
                    <span class="tag-name">{{$tag->name}}</span>

                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-12">
            <div id="input-tags">
                @foreach($tags as $tag)
                    @if($tag->active)
                    <input type="hidden" value="{{$tag->id}}" name="tags[]" />
                    @endif
                @endforeach
            </div>
        </div>
    </form>
</div>
