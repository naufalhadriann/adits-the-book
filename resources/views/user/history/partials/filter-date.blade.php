
      <form action="{{route('history', ['sort'=>$sort, 'date'=>$date] )}}" >
         
         <input type="date" id="datepicker" class="form-control rounded-3"  placeholder="pilih tanggal pembelianmu" name="date" value="{{request('date')}}" onchange="this.form.submit()" />
      </form>
