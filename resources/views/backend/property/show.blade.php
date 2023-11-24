@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Property List</h3>

            </div>
            <div class="div" style="max-height:400px!important;overflow-y: auto!important;">
                <table>
                    <thead>
                        <tr>
                            <th style="padding:25px;">Sl.No</th>
                            <th style="padding:25px;">Property Image</th>
                            <th style="padding:25px;">Owner</th>
                            <th style="padding:25px;">Title</th>
                            <th style="padding:25px;">Property Type</th>
                            <th style="padding:25px;">Property Price </th>
                            <th style="padding:25px;">Property Old Price</th>
                            <th style="padding:25px;">Total Bedrooms </th>
                            <th style="padding:25px;">Total Bathrooms </th>
                            <th style="padding:25px;">Total Balconies</th>
                            <th style="padding:25px;">Total kitchens</th>
                            <th style="padding:25px;">Area (sqft)</th>
                            <th style="padding:25px;">Location </th>
                            <th style="padding:25px;">Contact Number </th>
                            <th style="padding:25px;">Contact Email </th>
                            <th style="padding:25px;">Contact Address </th>
                            <th style="padding:25px;">Status </th>
                            <th style="padding:25px;">Created At </th>
                            <th style="padding:25px;width:300px;">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $value)
                            <tr>
                                <td style="padding:86px;">{{ $loop->iteration}}</td>
                                <td style="padding:25px;"><img style="height:100px;width:100px" src="{{asset($value->image)}}" alt="property"></td>
                                <td style="padding:25px;">{{ $value->owner->name}}</td>
                                <td style="padding:25px;">{{ $value->title}}</td>
                                <td style="padding:25px;">{{ $value->property_type}}</td>
                                <td style="padding:25px;">&#2547; {{ $value->price}}</td>
                                <td style="padding:25px;">&#2547; {{ $value->old_price}}</td>
                                <td style="padding:25px;"><span class="status completed">{{ $value->bedrooms}}</span> </td>
                                <td style="padding:25px;"><span class="status pending">{{ $value->bathrooms}}</span></td>
                                <td style="padding:25px;"><span class="status completed">{{ $value->balconies}}</span></td>
                                <td style="padding:25px;"><span class="status pending">{{ $value->kitchens}}</span></td>
                                <td style="padding:25px;">{{ $value->size_sqft}}</td>
                                <td style="padding:25px;">{{ $value->location}}</td>
                                <td style="padding:25px;">{{ $value->contact_number}}</td>
                                <td style="padding:25px;">{{ $value->contact_address}}</td>
                                <td style="padding:25px;">{{ $value->contact_email}}</td>
                                <td style="padding: 25px;">
                                    @if($value->status == 0)
                                        Pending
                                    @elseif($value->status == 1)
                                        Approved
                                    @elseif($value->status == 2)
                                        Rejected
                                    @elseif($value->status == 3)
                                        Blocked
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td style="padding:25px;">{{ \Carbon\Carbon::parse($value->created_at)->format('jS F Y h:i:s A') }}</td>
                                <td style="padding:25px; width:300px; display: inline-block;"><a href="{{-- {{route('user.edit',$value->id)}} --}}"><button id="editButton" class="status completed" style="border:none;cursor:pointer">Edit</button></a><form action="{{-- {{ route('user.destroy', ['id' => $value->id]) }} --}}" method="post" style="display:inline;">@csrf @method('delete')<button type="submit" class="status pending" style="border:none;cursor:pointer">Delete</button></form></td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
