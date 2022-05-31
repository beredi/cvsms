<a class="sidebar-brand d-flex align-items-center justify-content-center p-0 href="{{route('admin')}}">
    <div class="sidebar-brand-icon m-0">
        @php
            $company = \App\Models\Company::where("is_company_app_owner", "=", true)->first();
        @endphp
        <img src="{{asset('img/companies/'.$company->id.'/'.$company->logo)}}" alt="logo" title="{{$company->name}}" class="img-fluid" style="width: 40px;">
    </div>
    <div class="sidebar-brand-text mx-3">{{strtoupper($company->name)}}</div>
</a>
