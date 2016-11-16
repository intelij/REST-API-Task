<table class="table table-responsive">
    <thead>
    
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($goustos as $gousto)
        <tr>
            
            <td>
                <a href="{!! route('goustos.edit', [$gousto->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('goustos.delete', [$gousto->id]) !!}" onclick="return confirm('Are you sure wants to delete this Gousto?')">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>