
<h5  class="mt-1">Status</h5>
    <form action="{{route('history', ['status'=>$status, 'sort'=>$sort, 'date'=>$date])}}" >
      
      <button class="btn btn-dark {{ request()->input('status') === 'success' ? 'active' : ''}}" name="status" value="success">Success</button>
      <button class="btn btn-dark {{ request()->input('status') === 'pending' ? 'active' : ''}}" name="status" value="pending">Pending</button>
      <button class="btn btn-dark {{ request()->input('status') === 'failed' ? 'active' : ''}}" name="status" value="failed">Failed</button>
    </form>