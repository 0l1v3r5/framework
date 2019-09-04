@extends('avored::layouts.app')

@section('meta_title')
    {{ __('avored::cms.page.edit.title') }}: AvoRed E commerce Admin Dashboard
@endsection

@section('page_title')
    {{ __('avored::cms.page.edit.title') }}
@endsection

@section('content')
<a-row type="flex" justify="center">
    <a-col :span="24">
        <page-save
            base-url="{{ asset(config('avored.admin_url')) }}"
            :page="{{ $page }}" inline-template>
        <div>
            <a-form 
                :form="pageForm"
                method="post"
                action="{{ route('admin.page.update', $page->id) }}"                    
                @submit="handleSubmit"
            >
                @csrf
                @method('put')
                @include('avored::cms.page._fields')
                
                <a-form-item>
                    <a-button
                        type="primary"
                        html-type="submit"
                    >
                        {{ __('avored::system.btn.save') }}
                    </a-button>
                    
                    <a-button
                        class="ml-1"
                        type="default"
                        v-on:click.prevent="cancelPage"
                    >
                        {{ __('avored::system.btn.cancel') }}
                    </a-button>
                </a-form-item>
            </a-form>
            </div>
        </page-save>
    </a-col>
</a-row>
@endsection