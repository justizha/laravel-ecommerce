@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-sm btn-primary text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                        <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Description</label>
                                    <textarea  name="description" class="form-control" >{{ $category->description }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control"/>
                                    <img src="{{ asset('/uploads/category/'.$category->image) }}" width="480px">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status"  class="form-check" {{ $category->status == '1' ? 'checked':'' }}/>
                                </div>
                                <div class="col-md-12">
                                    <h4>Seo Tags</h4>
                                    <br>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea  name="meta_keyword" class="form-control">{{ $category->meta_keyword }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta Description</label>
                                    <textarea  name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-github">Update</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection