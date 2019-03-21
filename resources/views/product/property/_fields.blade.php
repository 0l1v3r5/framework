

<div class="form-group">
    <label for="name">Name</label>
    <input type="text"
        name="name"
        value="{{ $property->getName() ?? '' }}"
        @if(!$isDefaultLang && !in_array('name', $property->getTranslatedAttributes()))
            disabled
        @endif
        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
        id="name" />
        @if ($errors->has('name'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label for="identifier">Identifier</label>
    <input type="text"
        name="identifier"
        value="{{ $property->getIdentifier() ?? '' }}"
        @if(!$isDefaultLang && !in_array('identifier', $property->getTranslatedAttributes()))
            disabled
        @endif
        class="form-control {{ $errors->has('identifier') ? ' is-invalid' : '' }}"
        id="identifier" />
        @if ($errors->has('identifier'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('identifier') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label for="use_for_all_products">Use for All Product</label>
    <select
        @if(!$isDefaultLang && !in_array('use_for_all_products', $property->getTranslatedAttributes()))
            disabled
        @endif
        name="use_for_all_products"
        class="form-control {{ $errors->has('use_for_all_products') ? ' is-invalid' : '' }}"
        id="use_for_all_products"
    >
        <option value="0">No</option>
        <option value="1">Yes</option>
       
    </select>
        @if ($errors->has('use_for_all_products'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('use_for_all_products') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="is_visible_frontend">Is Visible Frontend</label>
    <select
        @if(!$isDefaultLang && !in_array('is_visible_frontend', $property->getTranslatedAttributes()))
            disabled
        @endif
        name="is_visible_frontend"
        class="form-control {{ $errors->has('is_visible_frontend') ? ' is-invalid' : '' }}"
        id="is_visible_frontend"
    >
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select>
        @if ($errors->has('is_visible_frontend'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('is_visible_frontend') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="data_type">Data Type</label>
    <select
        name="data_type"
         @if(!$isDefaultLang && !in_array('data_type', $property->getTranslatedAttributes()))
            disabled
        @endif
        class="form-control {{ $errors->has('data_type') ? ' is-invalid' : '' }}"
        id="data_type"
    >
        <option value="VARCHAR">Varchar (max 255)</option>
        <option value="DECIMAL">Decimal</option>
        <option value="TEXT">Text (Big text e.g. Description)</option>
        <option value="INTEGER">Integer</option>
        <option value="DATETIME">Date time</option>
        <option value="BOOLEAN">Boolean</option>
    </select>
        @if ($errors->has('data_type'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('data_type') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="field_type">Field Type</label>
    <select
        name="field_type"
         @if(!$isDefaultLang && !in_array('field_type', $property->getTranslatedAttributes()))
            disabled
        @endif
        class="form-control {{ $errors->has('field_type') ? ' is-invalid' : '' }}"
        id="field_type"
    >
        
        <option value="TEXT">Text Field</option>
        <option value="CHECKBOX">Checkbox</option>
        <option value="TEXTAREA">Text Area</option>
        <option value="SELECT">Select (Dropdown)</option>
        <option value="DATETIME">Date Time</option>
        
    </select>
        @if ($errors->has('field_type'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('field_type') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label for="sort_order">Sort Order</label>
    <input type="text"
        @if(!$isDefaultLang && !in_array('sort_order', $property->getTranslatedAttributes()))
            disabled
        @endif
        name="sort_order"
        class="form-control {{ $errors->has('sort_order') ? ' is-invalid' : '' }}"
        id="sort_order" />
        @if ($errors->has('sort_order'))
        <span class='invalid-feedback'>
            <strong>{{ $errors->first('sort_order') }}</strong>
        </span>
    @endif
</div>



<?php

$pool = 'abcdefghijklmnopqrstuvwxyz';

$randomString = substr(str_shuffle(str_repeat($pool, 6)), 0, 6);

$hiddenClass = "d-none";
$editMode = false;


if (isset($property) && $property->propertyDropdownOptions->count() > 0) {
    $editMode = true;
    $hiddenClass = "";
}
?>

<div class="dynamic-field mb-4 {{ $hiddenClass }}">
    @if($editMode === true)
        @foreach($property->propertyDropdownOptions as $key => $dropdownOptionModel)
            <div class="dynamic-field-row mt-3">
                <div class="input-group col-md-12">
                    <span class="input-group-prepend">
                        <span class="input-group-text">Display Text</span>
                    </span>
                    <input class="form-control"
                           name="dropdown-options[{{ $dropdownOptionModel->id }}][display_text]"
                           value="{{ $dropdownOptionModel->display_text }}"/>
                    @if ($loop->last)
                        <span class="input-group-append  add-field">
                            <button class="btn btn-outline-secondary">Add</button>
                        </span>
                    @else
                        <span class="input-group-append  remove-field">
                            <button class="btn btn-outline-secondary">Remove</button>
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="dynamic-field-row mt-3">
            <div class="input-group col-md-12">
                <span class="input-group-prepend">
                    <span class="input-group-text">Display Text</span>
                </span>
                <input disabled class="form-control"
                       name="dropdown-options[{{ $randomString }}][display_text]"/>
                <span class="input-group-append  add-field"
                      style='cursor: pointer'>
                    <button class="btn btn-outline-secondary" type="button">
                        Add
                    </button>
                </span>
            </div>
        </div>
    @endif
    <div class="dynamic-field-row-template d-none">
        <div class="dynamic-field-row mt-3">
            <div class="input-group col-md-12">
                <span class="input-group-prepend">
                    <span class="input-group-text">Display Text</span>
                </span>
                <input class="form-control"
                       name="dropdown-options[__RANDOM_STRING__][display_text]"/>
                <span class="input-group-append  add-field"
                      style='cursor: pointer'>
                    <button class="btn btn-outline-secondary">
                        Add
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
