@extends('layouts.master')

@section('content')
<div class="panel-heading">
    <span style="font-size:18px; font-family:trebuchet MS, Tahoma,Arial; color:#333333; font-weight:bold">User  List </span>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100% class="table table-striped">
                @if(Session::has('msg'))
                <tr align="center">
                    <td colspan="2" align="center">
                        <p style="color: red">{!! session('msg') !!}</p>
                    </td>
                </tr>
                @endif
                <tr>
                    <td>
                        {{ Request::getClientIp(true) }}
                    </td>
                    <td align=right><a
                        style="float:right; border:2px solid #005BAA; padding:3px; border-radius:5px;"
                        class="add" href="{{ URL::to('/user_add') }}">Add New</a></td>
                    </tr>
                    <tr>
                        <td valign=top colspan="2">
                            <TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 ALIGN=center WIDTH=100%
                            class=" table table-striped">
                            <tr>
                                <td class=bodytext width=40><font color="#333333"><b>SL.</b></font></td>
                                <td class=bodytext width=100><font color="333333"><b>username </b></font></td>
                                <td class=bodytext width=200><font color="333333"><b>email </b></font></td>
                                <td class=bodytext width=100><font color="333333"><b>Group </b></font></td>
                                <td class=bodytext width=100><font color="333333"><b>Image </b></font></td>

                                <td class=bodytext width=40 align="center"><font color="333333"><b>Status</b></font>
                                </td>
                                <td class=bodytext width=40 align="center"><font color="333333"><b>Edit</b></font>
                                </td>
                                <td class=bodytext width=40 align="center"><font color="333333"><b>Delete</b></font>
                                </td>
                            </tr>

                            @php $i = $user->perPage() * ($user->currentPage()-1);

                            @endphp
                            @foreach ($user as $user_data)
                            <tr>
                                <td class=bodytext><font size=2 color="#333333">
                                {{ ++$i }}</font></td>
                                <td class=bodytext><font size=2 color="#005BAA">{{ $user_data->name }}</font>
                                </td>
                                <td class=bodytext><font size=2 color="#333333">{{ $user_data->email }}</font>
                                </td>
                                <td class=bodytext><font size=2 color="#333333">{{ $user_data->group }}</font>
                                </td>

                                <td class=bodytext><font size=2 color="#333333">@if ($user_data->image)
                                    <a target="_blank"
                                    href="{{ url($user_data->image_path.$user_data->image) }}">
                                    <img src="{{ asset($user_data->image_path.$user_data->image) }}"
                                    class="img-circle" width="40px" height="35px"></a>
                                @endif</font></td>

                                <TD class=bodytext align="center"><a
                                    href="{{ URL::to('user_status_change/'.$user_data->id.'/'.$user_data->status)}}">@if($user_data->status)
                                    <img src="{{ asset('public/admin_images/yes.gif')}}" border=0>@else
                                    <img src="{{ asset('public/admin_images/no.gif')}}" border=0/>@endif
                                </a></TD>

                                <td class=bodytext align="center"><a class=menu
                                 href="{{URL::to('/user_edit/'.$user_data->id)}}"><img
                                 src="{{ asset('public/admin_images/edit.gif')}}" border=0/></a>
                             </td>

                             <TD class=bodytext align="center"><a class=menu
                                 href="JavaScript:del({{ $user_data->id }})"><img
                                 src="{{ asset('public/admin_images/del.gif')}}" border=0/></a>
                             </TD>

                         </tr>

                         @endforeach
                         <tr align=center>
                            <td colspan=11>
                                {{ $user->links() }}
                            </td>
                        </tr>
                    </TABLE>
                </td>
            </tr>
        </TABLE>
    </div>
</div>
</div>
<script language="JavaScript">
    function del(id) {
        if (confirm("Are you sure to delete the entry?") == 1)
            document.location = "{{ URL::to('/user_del') }}/" + id;
    }
</script>
@endsection
