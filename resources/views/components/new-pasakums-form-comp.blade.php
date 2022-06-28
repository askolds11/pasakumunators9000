<div>
        <div id="izveidot-jaunu-pasakumus">
            <h3>Publicēt jaunu pasākumu</h3>
            @foreach ($errors->all() as $message) {
                <strong>{{ $message }}</strong><br>
            }
            @endforeach
            <form method="POST"
            action="{{action([App\Http\Controllers\PasakumsController::class, 'store']) }}">
                @csrf
                <label for="">Nosaukums text</label><br>
                <input type="text" id="nosaukums" name="nosaukums" value="{{ old('nosaukums')}}" class="form-control @error('nosaukums') is-invalid @enderror"><br>
                @error('nosaukums')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="">Apraksts text</label><br>
                <textarea rows="10" cols="30" id="apraksts" name="apraksts" class="form-control @error('apraksts') is-invalid @enderror">{{ old('apraksts')}}</textarea><br>
                @error('apraksts')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="">Datums date</label><br>
                <input type="date" id="datums" name="datums" value="{{ old('datums')}}" class="form-control @error('datums') is-invalid @enderror"><br>
                @error('datums')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="">Norises ilgums time</label><br>
                <input type="time" id="norises_ilgums" name="norises_ilgums" value="{{ old('norises_ilgums')}}" class="form-control @error('norises_ilgums') is-invalid @enderror"><br>
                <label for="">Norises vieta text</label><br>
                <input type="text" id="norises_vieta" name="norises_vieta" value="{{ old('norises_vieta')}}" class="form-control @error('norises_vieta') is-invalid @enderror"><br>
                <label for="">Cena skaitlis</label><br>
                <input type="number" step="0.01" id="cena" name="cena" value="{{ old('cena')}}" class="form-control @error('cena') is-invalid @enderror"><br>
                {{--<label for="">Veidotajs foreign id</label><br>
                <input type="text" id="veidotajs_id" name="veidotajs_id" value="{{ old('veidotajs_id')}}" class="form-control @error('veidotajs_id') is-invalid @enderror"><br>--}}
                <input type="hidden" id="veidotajs_id" name="veidotajs_id" value="{{Auth::user()->id}}">
                <label for="">Kategorija foreign id</label><br>
                <select id="" name="" multiple>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select><br>
                <input type="submit" value="Submit">
            </form>
        </div>
</div>