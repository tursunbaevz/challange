

    <div class="row">
        {{--<div class="col">--}}
            {{--<div class="form-check">--}}
                {{--<div class="form-check">--}}
                    {{--<label class="form-check-label">--}}
                        {{--<input type="checkbox" class="form-check-input" name="addMore[0][sdone]" value="{{old('sdone') ? old('sdone') : $goal->sdone}}" id="sdone">--}}
                        {{--<span class="form-check-sign"></span>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="col-10">
            <div class="form-group input-center">
                <input type="text" name="soul_title" value="{{ old('soul_title') ? old('soul_title') : $soul->title }}" placeholder="Духовное" class="form-control"  required/>
            </div>
        </div>

        <div class="col">
            <button type="button" name="addInputs" id="addSoul" class="btn btn-success "><span class="fa fa-plus"></span></button>
        </div>
    </div>

    <div id="soulInputs">
    </div>

    <div class="form-group">
        <label for="sdescription">Описание</label>
        <textarea  name="soul_description"  class="form-control" cols="20" rows="3">{{ old('soul_description') ? old('soul_description') : $soul->description }}</textarea>
    </div>
<hr>
    <div class="row">
        <div class="col-10">
            <div class="form-group input-center">
                <input type="text" name="intellect_title" value="{{ old('intellect_title') ? old('intellect_title') : $intellect->title }}"  placeholder="Интеллект" class="form-control" required/>
            </div>
        </div>

        <div class="col">
            <button type="button" name="addIntellect" id="addIntellect" class="btn btn-success "><span class="fa fa-plus"></span></button>
        </div>
    </div>


    <div id="intellectInputs">
    </div>

    <div class="form-group">
        <label for="idescription">Описание</label>
        <textarea  name="intellect_description"  class="form-control" cols="20" rows="3">{{ old('intellect_description') ? old('intellect_description') : $intellect->description }}</textarea>
    </div>


{{--<div class="form-check mt-3">--}}
    {{--<div class="form-check">--}}
        {{--<label class="form-check-label">--}}
            {{--<input type="checkbox" class="form-check-input" name="idone" id="idone"  value="{{old('idone') ? old('idone') : $goal->idone}}"> Выполнил--}}
            {{--<span class="form-check-sign"></span>--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</div>--}}



<hr>
<div class="row">
    <div class="col-10">
        <div class="form-group input-center">
            <input type="text" name="sport_title" value="{{ old('sport_title') ? old('sport_title') : $sport->title }}" placeholder="Спорт" class="form-control" required/>
        </div>
    </div>

    <div class="col">
        <button type="button" name="addSport" id="addSport" class="btn btn-success"><span class="fa fa-plus"></span></button>
    </div>
</div>

<div id="sportInputs">
</div>

<div class="form-group">
    <label for="spdescription">Описание</label>
    <textarea  name="sport_description"  class="form-control" cols="20" rows="3">{{ old('sport_description') ? old('sport_description') : $sport->description }}</textarea>
</div>


{{--<div class="form-check mt-3">--}}
    {{--<div class="form-check">--}}
        {{--<label class="form-check-label">--}}
            {{--<input class="form-check-input" name="spdone" id="spdone" type="checkbox" value="{{old('spdone') ? old('spdone') : $goal->spdone}}"> Выполнил--}}
            {{--<span class="form-check-sign"></span>--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</div>--}}

{{--@section('scripts')--}}
    {{--<script type="text/javascript">--}}
        {{--var sdone = $('#sdone').val();--}}
        {{--var idone = $('#idone').val();--}}
        {{--var spdone = $('#spdone').val();--}}

        {{--if (sdone === "1") {--}}
            {{--$('#sdone').prop('checked', true);--}}
        {{--}--}}

        {{--if (idone === "1") {--}}
            {{--$('#idone').prop('checked', true);--}}
        {{--}--}}

        {{--if (spdone === "1") {--}}
            {{--$('#spdone').prop('checked', true);--}}
        {{--}--}}



        {{--var s = 0;--}}

        {{--$("#addSoul").click(function(){--}}

        {{--++s;--}}

        {{--$("#soulInputs").append(--}}
            {{--'<div id="parentSoul">' +--}}
            {{--'<div class="row">' +--}}
                    {{--'<div class="col-10">' +--}}
                        {{--'<div class="form-group input-center">' +--}}
                        {{--'    <input type="text" name="soul[]" value="{{ old('soul') ? old('soul') : $goal->soul }}" placeholder="Духовное '+s+'" class="form-control"  required/>' +--}}
                        {{--'</div>' +--}}
                    {{--'</div>' +--}}

                    {{--'<div class="col">' +--}}
                        {{--'<button type="button" class="btn btn-danger Sremove-div"><span class="fa fa-trash"></span></button>' +--}}
                    {{--'</div>' +--}}

                {{--'</div>' +--}}
            {{--'</div>'--}}
            {{--);--}}
        {{--});--}}

        {{--$(document).on('click', '.Sremove-div', function(){--}}
            {{--$(this).parents('#parentSoul').remove();--}}
        {{--});--}}


    {{--//    ---------------------------------------------------------}}

        {{--var i = 0;--}}

        {{--$("#addIntellect").click(function(){--}}

            {{--++i;--}}

            {{--$("#intellectInputs").append(--}}
                {{--'<div id="parentIntellect">' +--}}
                {{--'<div class="row">' +--}}
                {{--'<div class="col-10">' +--}}
                {{--'<div class="form-group input-center">' +--}}
                {{--'    <input type="text" name="intellect[]" value="{{ old('intellect') ? old('intellect') : $goal->intellect }}" placeholder="Духовное '+i+'" class="form-control" required />' +--}}
                {{--'</div>' +--}}
                {{--'</div>' +--}}

                {{--'<div class="col">' +--}}
                {{--'<button type="button" class="btn btn-danger Iremove-div"><span class="fa fa-trash"></span></button>' +--}}
                {{--'</div>' +--}}

                {{--'</div>' +--}}
                {{--'</div>'--}}
            {{--);--}}
        {{--});--}}

        {{--$(document).on('click', '.Iremove-div', function(){--}}
            {{--$(this).parents('#parentIntellect').remove();--}}
        {{--});--}}



        {{--//    ---------------------------------------------------------}}

        {{--var sp = 0;--}}

        {{--$("#addSport").click(function(){--}}

            {{--++sp;--}}

            {{--$("#sportInputs").append(--}}
                {{--'<div id="parentSport">' +--}}
                {{--'<div class="row">' +--}}
                {{--'<div class="col-10">' +--}}
                {{--'<div class="form-group input-center">' +--}}
                {{--'    <input type="text" name="sport[]" value="{{ old('sport') ? old('sport') : $goal->sport }}" placeholder="Спорт '+sp+'" class="form-control" required/>' +--}}
                {{--'</div>' +--}}
                {{--'</div>' +--}}

                {{--'<div class="col">' +--}}
                {{--'<button type="button" class="btn btn-danger SPremove-div"><span class="fa fa-trash"></span></button>' +--}}
                {{--'</div>' +--}}

                {{--'</div>' +--}}
                {{--'</div>'--}}
            {{--);--}}
        {{--});--}}

        {{--$(document).on('click', '.SPremove-div', function(){--}}
            {{--$(this).parents('#parentSport').remove();--}}
        {{--});--}}

    {{--</script>--}}
{{--@endsection--}}