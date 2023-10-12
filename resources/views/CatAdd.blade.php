<x-header />

<div id="wrap">
    <div class="clear" style="height:5px;"></div>
    @if (session("data"))
    <h1 class="text-success">{{session("data")}}</h1>
    @endif  
    <form action="{{ route('name_addCategory') }}" method="post">

      <div id="wrap2">
        <h1>Add Category</h1>
        <br>
        @csrf
        <div class="form-raw">
          <div class="form-name">Category Name</div>
          <div class="form-txtfld">
            <input type="text" name="cat_name" >
          </div>
        </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>    
        <div class="form-raw">
          <div class="form-name">Active</div>
          <div class="form-txtfld">
            <input type="checkbox" name="cat_status">
          </div>      
          <div class="clear"></div>
        </div>
            
        <div class="form-raw">
          <div class="form-name">&nbsp;</div>
          <div class="form-txtfld" style="width:290px;">
            <input type="submit" class="btn" value="Submit" name="add-cat">
          </div>
        </div>
      </div>
    </form>  
    <div class="clear">&nbsp;</div>
  </div>
  <div id="wrap3">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
      <tr>
        <th width="59" align="left" valign="middle">Sr.No.</th>
        <th width="752" align="left" valign="middle">Category Name</th>
        <th width="77" align="left" valign="middle">Status</th>
        <th width="54" align="left" valign="middle">Edit</th>
        <th width="71" align="left" valign="middle">Remove</th>
      </tr>
      @isset($all_category)

      @foreach ($all_category as $cat)
        <tr>
          <td align="left" valign="top">{{$cat["id"]}}</td>
          <td align="left" valign="top">{{$cat["cat_name"]}}</td>
          <td align="left" valign="top">
              <strong> 
                  @if ($cat["cat_status"] == "1")
                      <span class="text-success">Active </span>
                  @else
                      <span class="text-danger">Deactive </span>
                  @endif
              </strong>
          </td>
          <td align="left" valign="top"><a href="{{route('name_addCategorys')}}/{{$cat["id"]}}">Edit</a></td>
          <td align="center" valign="top">
              <a href="{{route('name_delCategory')}}/{{$cat["id"]}}"><img src="images/icon-bin.jpg" alt="" width="25" height="25" border="0" align="absmiddle" /></a>
          </td>
        </tr>                 
      @endforeach
      @endisset
    </table>
    <div class="clear">&nbsp;</div>
  </div>    
@isset($data)
    {{$data}}
@endisset
<x-footer />