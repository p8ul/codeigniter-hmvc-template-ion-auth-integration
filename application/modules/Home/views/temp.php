{% extends "dashboard/base.html" %}
{% load prices_i18n %}
{% load i18n %}
{% load materializecss %}
{% load staticfiles %}
{% load attributes %}


{% block title %}
  {% if product.pk %}
    {{ product }}
  {% else %}
    {% trans "Add new product" context "Product form page title" %}
  {% endif %}
   - {% trans "Products" context "Dashboard products list" %} - {{ block.super }}
{% endblock %}

{% block body_class %}body-products{% endblock %}

{% block menu_products_class %}active{% endblock %}

{% block header_menu %}
  {% url "dashboard:product-list" as url %}
  {% include "dashboard/includes/_back-link.html" with url=url %}
{% endblock %}

{% block breadcrumbs %}
 
    <li>
      <a href="{% url "dashboard:product-list" %}" >
        {% trans "Products" context "Dashboard products list" %}
      </a>
    </li>
   
    <li class="active">
     
        {% if product.pk %}
          {{ product }}
        {% else %}
          {% trans "Add new product" context "Product form breadcrumbs" %}
        {% endif %}
     
    </li>
  
{% endblock %}

{% block header_extra %}
  {% if product.pk %}
  <li>              
    <a href="{{ product.get_absolute_url }}"><i class="icon-eye position-left"></i>  {% trans "View on site" context "Dashboard preview action" %}
    </a>
  </li>
  <li>
    <a href="#modal_instance" data-href="{% url 'dashboard:product-delete' pk=product.pk %}"
        class="modal-trigger"><i class="icon-trash position-left"></i> 
          {% trans "Remove product" context "Product form action" %}
        </a>
  </li>   
   
  {% endif %}
{% endblock %}

{% block menu_catalogue_class %} active{% endblock %}

{% block content %}
<div id='results'></div>
<div class="row">
    <div class="col-md-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Product Details</h6>                
                <div class="heading-elements">
                  <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                          </ul>
                        </div>
              </div>

              <div class="panel-body">
                <div class="tabbable tab-content-bordered">
                  <ul class="nav nav-tabs nav-tabs-highlight">
                  <!-- general settings tab -->
                   {% if request.GET.tab %}                   
                     <li>             
                    {% else %}
                      <li class="active">
                    {% endif %}
                    <a href="#bordered-tab1" data-toggle="tab">General Settings</a></li>
                    {% if product.pk %}
                    <!-- variant tab -->
                    {% if request.GET.tab == 'variants'  %}                   
                     <li class="active">
                    {% else %}
                      <li>             
                    {% endif %}
                    <a href="#bordered-tab2" data-toggle="tab">Product Variant</a></li>
                    <!-- stock tab -->
                   {% if request.GET.tab == 'stock'  %}                   
                     <li class="active">
                    {% else %}
                      <li>             
                    {% endif %}
                    <a href="#stock-tab" data-toggle="tab">Stock</a></li>
                    <!-- images tab -->
                    {% if request.GET.tab == 'images'  %}                   
                     <li class="active">
                    {% else %}
                      <li>             
                    {% endif %}
                    
                    <a href="#images-tab" data-toggle="tab">Images</a></li>
                    {% endif %}
                    
                  </ul>

                  <div class="tab-content">
                  {% if request.GET.tab %}                   
                     <div class="tab-pane has-padding" id="bordered-tab1">            
                    {% else %}
                      <div class="tab-pane has-padding active" id="bordered-tab1">
                    {% endif %}
                   
                       <!-- 2 columns form -->
        <form method="post" class="form-horizontal" id="form-product" enctype="multipart/form-data" novalidate>
          {% csrf_token %}         
            <div class="panelpanel-flat">
             
              <div class="panel-body">
              
                {% if errors %}
                <div class="alert alert-danger alert-styled-left">
                  {{errors}} 
                  </div>             
                {% endif %}
              
                <div class="row">
                  <div class="col-md-6">
                    {% if product.pk %}
                    <fieldset id='fieldset1' > 
                    {% else %}
                    <fieldset>
                    {% endif %}
                    <!-- product name -->
                      <div class="form-group">
                        <label>Product Name:<i class='text-danger'> *</i></label>
                        {{ product_form.name}}
                      </div>
                      <!-- product category -->
                      <div class="form-group">
                        <label>
                        {{ product_form.categories.label }}:
                        <i class='text-danger'> *</i><button type="button" class="btn btn-flat btn-sm" data-popup="popover" data-placement="bottom" title="Product category" data-trigger="hover" data-content=" products offering the same general functionality.E.g Flour would fall under Grocery category"> <i class="icon-info22 position-right"></i></button>
                        </label>
                       <div class="row">
                        <div class="col-md-10" id='category_field'>              
                          <div class="multi-select-full">   
                            {{ product_form.categories }}
                          </div>                         
                        </div>
                        <div class="col-md-2">
                          <button href="#modal_add_category" class="btn btn-flat" id="add-new-category" data-title="Add New category" data-href='{% url "dashboard:category-add" %}' data-csrf="{% csrf_token %}" onclick='return false;'>
                          <i class=" icon-stack-plus"></i>           
                          </button>
                        </div>
                        
                       </div>
                      </div> 

                      <div id='productType'>
                      <!-- product type -->
                      <div class="form-group">
                      <label>Product Type</label> <button type="button" class="btn btn-flat btn-sm" data-popup="popover" data-placement="bottom" title="Product Type" data-trigger="hover" data-content="Think about it as template for your products. Multiple products can use same product class. E.g Flour, Electronics"> <i class="icon-info22 position-right"></i></button>
                      <div class="input-group">          
                      {{ product_form.product_class}}
                         <div class="input-group-btn">
                            <button type="button"  id="add-new-type" href="#modal_add_category" class="btn btn-flat" data-title="Add New category" data-href='{% url "dashboard:product-class-add-new" 12 %}' data-csrf="{% csrf_token %}" onclick='return false;'>
                            <i class=" icon-stack-plus"></i>                   
                            </button>
                          </div>
                      </div>
                       <!-- form_classes }} -->
                      </div>

                      <!-- product attributes -->
                      <div class="form-group" id='div_attributes'>
                        <label>Product Attributes</label>
                        <button type="button" class="btn btn-flat btn-sm" data-popup="popover" data-placement="bottom" title="Product Type" data-trigger="hover" data-content="– it’s a characteristic of a product, shared with all product variants. Example: Manufacturer - all flour variants(1kg,2kg) are published by same company"> <i class="icon-info22 position-right"></i></button>
                        <span>
    <a href="">
      <button id="add-new-attribute" onclick="return false;" class="btn btn-flat text-bold btn- btn-lg" data-refresh="{% url 'dashboard:product-class-add' %}" data-href='{% url "dashboard:product-attr-add-value" 1 %}'
              href="#modal_attribute">
    <i class=" icon-stack-plus"></i>   
    </button>
    </a>
    <i class="icon-database-refresh" onclick="refreshAttributes()"></i>
  </span>
                         {% for attribute_field in product_form.iter_attribute_fields %}
                         <div class="">
                         <label>{{ attribute_field.label }}</label>
                          {{ attribute_field }}
                        </div>
                        {% endfor %}
                      </div>
                      </div>
                      <div class="form-group">
                        <label>Product Description:<i class='text-danger'> *</i></label>
                       {{ product_form.description }}
                      </div>                  
                    </fieldset>
                  </div>

                  <div class="col-md-6">
                    {% if product.pk %}
                    <fieldset id='fieldset2'> 
                    {% else %}
                    <fieldset>
                    {% endif %} 
                      <div class="">
                      <!-- Tax -->
                       <div class="col-md-12">
                          <div class="form-group col-md-12" id='tax_field'>
                            <label>Tax: % </label>
                            <div class="input-group">
                            {{ product_form.product_tax }}
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-flat" id="add-new-tax"><i class=" icon-stack-plus"></i></button>
                              </div>
                             </div>
                          </div>
                        </div>
                        <!-- Retail price exclusive tax -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12">Retail Price:<i class='text-danger'>*</i><span class="text-muted text-small">(Inclusive Tax)</span></label>
                            {{ product_form.price }}                
                          </div>
                        </div>
                        <!-- wholesale price exclusive tax -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12">wholesale Price:<span class="text-muted text-small">(Inclusive Tax)</span></label>
                            {{ product_form.wholesale_price }}                     
                          </div>
                        </div>

                        <!-- disabled display -->
                        <div class="col-md-6 divider">
                          <div class="form-group">
                            <label class="col-md-12 text-muted">Retail Price:<span class="text-muted text-small">(Before Tax)</span></label>
                          <span class="col-md-12">
                           <input type="disabled" name="retail_plus_tax" id="retail_plus_tax" class="form-control" value="" disabled="">
                           </span>                  
                          </div>                    
                        </div>
                        <!-- wholesale disabled -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12 text-muted">wholesale Price:(Before Tax)</label>
                            <span class="col-md-12">
                           <input type="disabled" name="wholesale_plus_tax" id="wholesale_plus_tax" class="form-control" value="" disabled="">
                           </span>                  
                          </div>                    
                        </div>
                        <!-- tax in KES -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12 text-muted">Retail Tax:</label>
                            <span class="col-md-12">
                           <input type="disabled" name="retail_tax" id="retail_tax" class="form-control" value="" disabled="">
                           </span>                  
                          </div>                    
                        </div>
                        <!-- wholesale tax -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12 text-muted">Wholesale Tax:</label>
                            <span class="col-md-12">
                           <input type="disabled" name="wholesale_tax" id="wholesale_tax" class="form-control" value="" disabled="">
                           </span>                  
                          </div>                    
                        </div>
                        
                      </div>

                      <div class="">
                        <div class="col-md-12">
                          <div class="form-group col-md-12">
                            <label>Reorder Stock Threshold:</label>
                           {{ product_form.low_stock_threshold }}
                          </div>
                        </div>
                        <div class="col-md-12" id="div_supplier">
                        <label>Supplier:</label>
                         <div class="input-group">
                           
                           {{ product_form.product_supplier }}
                          <span class="input-group-btn">
                           <button id="add-supplier" onclick="return false;" class="btn btn-flat text-bold btn- btn-lg"  data-href='{% url "dashboard:supplier-ajax-add"  %}'
              href="#modal_attribute">
    <i class=" icon-stack-plus"></i>   
    </button>
                          </span>
                         </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group col-md-12">
                            <label>Available From:</label>
                           {{ product_form.available_on }}
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                             {% if not product.product_class.has_variants %}
                                <div class="">
                                  {{ variant_form.sku }}
                                </div>
                             {% endif %}
                          </div>
                        </div>
                        <!-- <div class='col-md-6'>
                          <div class='form-group'>
                           <label class="checkbox-inline">
                            {{ product_form.is_featured }}
                            {{ product_form.is_featured.label }}
                            &nbsp;
                          </label>
                           
                          </div>
                        </div> -->
                      </div>
                    </fieldset>
                  </div>                  
                </div>
                

                <div class="text-right">
                  {% if product.pk %}
              <a href="{% url 'dashboard:product-list' %}" class="btn btn-flat ">
                {% trans "Cancel" context "Dashboard cancel action" %}
              </a>
              <button type="submit" class="btn btn-primary waves-effect waves-light">
                {% trans "Update" context "Dashboard update action" %}
              </button>
            {% else %}
              <a href="{% url 'dashboard:product-list' %}" class="btn   btn-flat">
                {% trans "Cancel" context "Dashboard cancel action" %}
              </a>
              <button type="submit" class="btn btn-primary  waves-effect waves-light">
                {% trans "Create" context "Dashboard create action" %}
              </button>
            {% endif %}
                </div>
              </div>
            </div>
          </form>
          <!-- /2 columns form -->
                    </div>
                    <!-- panel product variant -->
                    {% if request.GET.tab == 'variants'  %}                   
                     <div class="tab-pane has-padding active" id="bordered-tab2">
                    {% else %}
                      <div class="tab-pane has-padding" id="bordered-tab2">            
                    {% endif %}
                    
                    {% if product.pk %}
                      {% if product.product_class.has_variants %}
      <div id="variants" class="">
        <form method="post" action="{% url 'dashboard:variant-bulk-delete' product_pk=product.pk %}" novalidate>
          {% csrf_token %}
          <div class="data-table-header-action" style="padding:8px;">
            <a href="{% url 'dashboard:variant-add' product_pk=product.pk %}" class="btn-data-table btn-show-when-unchecked btn btn-primary">
              {% trans "Add" context "Dashboard add action" %}
            </a>
            <a href="#modal-product-variant-delete" class="modal-trigger btn-data-table btn-show-when-checked btn btn-danger" style="display:none" hidden>
              {% trans "Delete" context "Dashboard delete action" %}
            </a>

            <div class="modal fade" id="modal-product-variant-delete">
            <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title text-white">Delete Variant(s)</h6>
              </div>
              <div class="modal-body">
                <h5>
                  {% trans "Are you sure?" context "Dashboard confirmation modal" %}
                </h5>
                <p>
                  {% blocktrans trimmed context "Modal delete variant from product text" %}
                    You are about to delete variants of this product.
                  {% endblocktrans %}
                </p>
                </div>
                <!-- add footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger modal-action ">
                  {% trans "Delete" context "Dashboard delete action" %}
                </button>
                <a href="#!" data-dismiss="modal" class="modal-action btn btn-link ">
                  {% trans "Cancel" context "Dashboard cancel action" %}
                </a>
              </div>
                <!-- end footer -->
              </div>
              </div>
              
            </div>
          </div>
          <div class="data-table-container">
            <table class="table  datatable-header-footer">
              {% if variants %}
                <thead>
               
                  <tr class="bg-primary">
                    <th class="bulk-checkbox">
                      <input type="checkbox" id="select-all-variants" class="filled-in select-all switch-actions">
                      <label for="select-all-variants"></label>
                    </th>
                    <th>
                      {% trans "SKU" context "Product variant table header" %}
                    </th>
                    {% for attribute in attributes %}
                      <th>
                        {{ attribute.name|capfirst }}
                      </th>
                    {% endfor %}
                    <th class="wide">
                      {% trans "Variant name" context "Product variant table header" %}
                    </th>
                    
                    <th class="right-align">
                      Retail Price
                    </th>
                    <th class="right-align">
                      Wholesale Price
                    </th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  {% for variant in variants %}
                    <tr data-action-go="{% url 'dashboard:variant-update' product_pk=product.pk variant_pk=variant.pk %}" title="{% trans "Edit variant" context "Product variant table link title" %}">
                      <td class="bulk-checkbox ignore-link">
                        <input id="id_variants_{{ variant.id }}" name="items" type="checkbox" value="{{ variant.id }}" class="filled-in switch-actions">
                        <label for="id_variants_{{ variant.id }}"></label>
                      </td>
                      <td>
                        {{ variant.sku }}
                      </td>
                      {% for attr_display in variant|attributes_values_with_empty:attributes %}
                        <td>
                          {{ attr_display }}
                        </td>
                      {% endfor %}
                      <td>
                        {{ variant.name }}
                      </td>
                      <!-- retail price -->
                      <td class="right-align">
                {% gross variant.get_price_per_item html=True %}
                      </td>
                      <!-- wholesale price -->
                      <td class="right-align">
                      {% if variant.get_wholesale_price_per_item %}
                {% gross variant.get_wholesale_price_per_item html=True %}
                     {% endif %}
                      </td>
                      <!-- actions -->
                    <td class="text-center">
                      <ul class="icons-list">
                        <li><a href="{% url 'dashboard:variant-update' product_pk=product.pk variant_pk=variant.pk %}"><i class="icon-pencil7" data-popup="tooltip" tite='Edit product' data-placement="bottom" data-original-title="Edit me"></i></a></li>
                        <li>
                   
                        </li>
                       
                      </ul>
                    </td>
                    </tr>
                  {% endfor %}
                </tbody>
              {% else %}
                  <tbody>
                    <tr>
                      <td>
                        <span>
                          {% trans "There are no variants for this product" context "Empty product variant table message" %}
                        </span>
                      </td>
                    </tr>
                  </tbody>
              {% endif %}
            </table>
          </div>
          <input type="hidden" name="success_url" value="{% url 'dashboard:product-update' pk=product.pk %}?tab=variants">
        </form>
      </div>
    {% endif %}
    {% endif %}
                    </div>
                    <!-- end product variant -->
                    <!-- product stock -->
                    {% if request.GET.tab == 'stock'  %}                   
                     <div class="tab-pane has-padding active" id="stock-tab">
                    {% else %}
                     <div class="tab-pane has-padding" id="stock-tab">            
                    {% endif %}
                    
                     {% if product.pk %}
                      <div id="stock" class="card">
      <form method="post" action="{% url 'dashboard:stock-bulk-delete' product_pk=product.pk %}" novalidate>
        {% csrf_token %}
        <div class="data-table-header-action" style="padding: 8px;">
          <a href="{% url 'dashboard:product-stock-add' product_pk=product.pk %}" class="btn-data-table btn-show-when-unchecked btn btn-primary">
            {% trans "Add" context "Product form stock tab table action" %}
          </a>
          <a href="#modal-product-stock-delete" class=" btn-data-table btn-show-when-checked btn btn-danger" data-toggle="modal"  data-target="#modal-product-stock-delete"  style="display:none" hidden>
            {% trans "Delete" context "Dashboard delete action" %}
          </a>
          <div class="modal fade" id="modal-product-stock-delete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title text-white">Delete Stock</h6>
              </div>
            <div class="modal-body">
              <h5>
                {% trans "Are you sure?" context "Dashboard confirmation modal" %}
              </h5>
              <p>
                {% blocktrans trimmed context "Modal delete stock from variant text" %}
                  You are about to delete stock for this product variant.
                {% endblocktrans %}
              </p>
            </div>
            <!-- end modal body -->
              <div class="modal-footer">
                <button type="submit" class="modal-action btn btn-danger">
                  {% trans "Delete" context "Dashboard delete action" %}
                </button>
                <a href="#!" class="modal-action modal-close  btn btn-link ">
                  {% trans "Cancel" context "Dashboard cancel action" %}
                </a>
              </div>
            <!-- end footer -->
            </div>
            </div>
            <!-- end dialog -->            
          </div>
          <!-- end modal -->
        </div>
        <div class="data-table-container">
          <table class="table table-bordered datatable-header-footer responsive data-table">
            {% if stock_items %}
            <thead>
              <tr class='bg-primary'>
                <th class="bulk-checkbox">
                  <input type="checkbox" id="select-all-stock" class="filled-in select-all switch-actions">
                  <label for="select-all-stock"></label>
                </th>
                <th>
                  {% trans "SKU" context "Stock table header" %}
                </th>
                <th> Cost Price</th>
                <th>
                  Retail Price
                </th>
                
                <th class="wide">
                  {% trans "Location" context "Stock table header" %}
                </th>
                <th class="right-align">
                  {% trans "Quantity" context "Stock table header" %}
                </th>
                <th class="right-align">
                  {% trans "Allocated" context "Stock table header" %}
                </th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {% for item in stock_items %}
                <tr data-action-go="{% url 'dashboard:product-stock-update' product_pk=product.pk stock_pk=item.pk %}" title="{% trans "Edit variant" context "Stock table action" %}">
                  <td class="bulk-checkbox ignore-link">
                    <input name="items" type="checkbox" id="{{ item.id }}" class="filled-in switch-actions switch-stock" value="{{ item.id }}">
                    <label for="{{ item.id }}"></label>
                  </td>
                  <td>
                    {{ item.variant.sku }}                    
                  </td>
                  <!-- cost price -->
                  <td>
                    {% if item.cost_price %}
                     {% gross item.cost_price %}
                    {% endif %}   
                  </td>
                  <!-- sales price -->
                  <td> 
                  {% gross item.variant.get_price_per_item html=True %}
                  </td>
                  
                  <td>
                    {{ item.location }}
                  </td>
                  <td class="right-align">
                    {{ item.quantity }}
                  </td>
                  <td class="right-align">
                    {{ item.quantity_allocated }}
                  </td>
                  <td>
                    <a href="{% url 'dashboard:product-stock-update' product_pk=product.pk stock_pk=item.pk %}"><i class="icon-pencil7" data-popup="tooltip" tite='Edit product' data-placement="bottom" data-original-title="Edit me">Edit</i></a>
                  </td>
                </tr>
              {% endfor %}
            </tbody>
            {% else %}
              <tbody>
                <tr>
                  <td>
                    <span>
                      {% trans "There is no stock for this product." context "Empty stock table message" %}
                    </span>
                  </td>
                </tr>
              </tbody>
            {% endif %}
          </table>
        </div>
        <input type="hidden" name="success_url" value="{% url 'dashboard:product-update' pk=product.pk %}?tab=stock">
      </form>
    </div>
    {% endif %}
                    </div>
                    <!-- end product stock -->
                    <!-- IMAGES tAB -->
                    {% if request.GET.tab == 'images'  %}                   
                     <div class="tab-pane has-padding active" id="images-tab">
                    {% else %}
                      <div class="tab-pane has-padding" id="images-tab">            
                    {% endif %}
                    
                     {% if product.pk %}
                         <div id="images" class="">
      <form action="{% url 'dashboard:product-images-upload' product_pk=product.pk %}" class="" id="product-image-form" novalidate>
        <div class="dz-message"></div>
        {% csrf_token %}
        <input type="hidden" name="success_url" value="{% url 'dashboard:product-update' pk=product.pk %}?tab=images">
        
        <div class="row">
          <div class="col-md-12">
            <div class="text-left" style="margin-bottom: 8px;">
              <a class="btn btn-primary  waves-effect waves-light " id="images-bt" href="{% url 'dashboard:product-image-add' product_pk=product.pk %}" title=""> Add Image 
                 </a>
            </div>
          </div>
          {% if images %}    
            
              {% for image in images %}
              <div class="col-lg-3 col-sm-6">
              <div class="thumbnail">
                <div class="thumb">
                  <img class="" 
                             src="{{ image.image.crop.255x255 }}" 
                             srcset="{{ image.image.crop.255x255 }} 1x, {{ image.image.crop.510x510 }} 2x"
                             alt="">
                  <div class="caption-overflow">
                    <span>
                      <a href="{{ image.image.crop.255x255 }}" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                      <a href="{% url 'dashboard:product-image-update' product_pk=product.pk img_pk=image.pk %}" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-pencil7"></i></a>
                    </span>
                  </div>
                </div>

                <div class="caption">
                  <h6 class="no-margin-top text-semibold"> <a href="{% url 'dashboard:product-image-update' product_pk=product.pk img_pk=image.pk %}" class="text-muted"><i class="icon-pencil pull-right"></i></a></h6>
                  {% if image.alt %}
                            {{ image.alt }}
                          {% else %}
                            <span class="">
                              {% trans "No description" context "Image card text" %}
                            </span>
                          {% endif %}
                <div class="card-action">
                        <a class="btn btn-flat" href="{% url 'dashboard:product-image-update' product_pk=product.pk img_pk=image.pk %}">
                          {% trans "Edit" context "Dashboard edit action" %}
                        </a>
                        <a href="#modal_instance" class="btn btn-flat modal-trigger " data-title='Delete Image' data-href="{% url 'dashboard:product-image-delete' product_pk=product.pk img_pk=image.pk %}">
                          {% trans "Delete" context "Dashboard delete action" %}
                        </a>
                      </div>
                </div>
              </div>
            </div>
               
              {% endfor %}
            
        {% else %}
          <p class="no-images">
            {% trans "This product has no images yet." context "Empty image gallery message" %}
          </p>
        {% endif %}
        <div class="col-md-12">
          <div class="text-right">
            <a class="btn btn-primary  waves-effect waves-light " id="images-bt" href="{% url 'dashboard:product-image-add' product_pk=product.pk %}" title=""> Add Image 
               </a>
          </div>
          </div>
      </div>
      </form>
      <script type="application/template" id="template">
        <li class='col s6 m3 product-gallery-item dz-preview dz-file-preview' data-id="{{ image.pk }}">
          <div class="row">
            <div class="card">
              <div class="card-image product-gallery-item-image">
                <img data-dz-thumbnail />
              </div>
              <div class="dz-progress">
                <span class="dz-upload" data-dz-uploadprogress></span>
              </div>
              <div class="card-content">
                <span class="product-gallery-item-title card-title black-text">
                  <span class="grey-text">
                    {% trans "No description" context "Empty image gallery message" %}
                  </span>
                </span>
              </div>
              <div class="sortable__drag-area"></div>
              <div class="card-action">
                <a class="card-action-edit" href="{% url 'dashboard:product-image-update' product_pk=product.pk img_pk=0 %}">
                  {% trans "Edit" context "Dashboard edit action" %}
                </a>
                <a href="#base-modal" class="card-action-delete modal-trigger-custom"
                data-href="{% url 'dashboard:product-image-delete' product_pk=product.pk img_pk=0 %}">
                  {% trans "Delete" context "Dashboard delete action" %}
                </a>
              </div>
            </div>
          </div>
        </li>
      </script>
    </div>
    {% endif %}
                     </div>
                    <!-- END IMAGES TAB -->
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>                
</div>
 
 {% include "dashboard/includes/_modal_images.html"  %}
 {% include "dashboard/includes/_modal_add_category.html"  %}
 {% include "dashboard/includes/_modal_add_tax.html"  %}
 {% include "dashboard/includes/_modal_attribute_choice.html"  %}
{% endblock %}

 {% block custom_js %}


 <script type="text/javascript" src="{% static 'backend/js/plugins/forms/styling/uniform.min.js' %}"></script>

  <script type="text/javascript" src="{% static 'backend/js/plugins/forms/styling/switch.min.js' %}"></script>


<script type="text/javascript" src="{% static 'backend/js/plugins/forms/styling/uniform.min.js' %}"></script>
  <script type="text/javascript" src="{% static 'backend/js/plugins/ui/moment/moment.min.js' %}"></script>
 
 
  <script type="text/javascript" src="{% static 'backend/js/plugins/pickers/pickadate/picker.js' %}"></script>
  <script type="text/javascript" src="{% static 'backend/js/plugins/pickers/pickadate/picker.date.js' %}"></script>
  <script type="text/javascript" src="{% static 'backend/js/plugins/pickers/pickadate/picker.time.js' %}"></script>
  <script type="text/javascript" src="{% static 'backend/js/plugins/forms/selects/bootstrap_multiselect.js' %}"></script>
  <script type="text/javascript" src="{% static 'backend/js/pages/form_multiselect.js' %}"></script>
    <script type="text/javascript" src="{% static 'backend/js/plugins/forms/selects/bootstrap_select.min.js' %}"></script>
  <script type="text/javascript" src="{% static 'backend/js/core/libraries/jquery_ui/core.min.js' %}"></script>

<script type="text/javascript" src="{% static 'backend/js/plugins/forms/selects/selectboxit.min.js' %}"></script>
<script type="text/javascript" src="{% static 'backend/js/plugins/forms/styling/switchery.min.js' %}"></script>
<!-- additional js -->
<script type="text/javascript" src="{% static 'backend/js/category.js' %}"></script>
<script type="text/javascript" src="{% static 'backend/js/productclass.js' %}"></script>
<script type="text/javascript" src="{% static 'backend/js/plugins/forms/selects/select2.min.js' %}"></script>
<script type="text/javascript" src="{% static 'backend/js/productattribute.js' %}"></script>
<script type="text/javascript" src="{% static 'backend/js/plugins/supplier.js' %}"></script>

<script type="text/javascript">
 

 {% if product.pk %}
 $("#edit-toggle").on('click',function(){
   if($(this).is(':checked')){
      $("#fieldset1").attr("disabled", false);
      $("#fieldset2").attr("disabled", false);
    }else{
      $("#fieldset1").attr("disabled", true);
      $("#fieldset2").attr("disabled", true);
    }
   });
 {% endif %}
  

 function roundOff(val){
  return Math.round(val * 100) / 100;
 }
 function getTax(){
    // get tax value
    {% url "dashboard:tax-add-ajax" as url %} 
    var url = "{{ url }}";
    var tax_id = $('#id_product_tax').val();
    var posting = $.post( url, {tax_id:tax_id,} );
    posting.done(function( data ){       
      if(data.length > 3)
      {
        localStorage.setItem('tax', parseInt(0));
      }else{
       localStorage.setItem('tax', parseInt(data)); 
      }
      pricing()
     });    
    return localStorage.getItem("tax");
    
 }
 getTax()
 function pricing(){
  // fetch tax from the server
  var tax = localStorage.getItem("tax")
  // calculate retail tax exclusive tax       
  var retail = $('#id_price').val();
  var retail_plus_tax = (parseInt(retail)*100)/(parseInt(tax)+100);
  retail_plus_tax=roundOff(retail_plus_tax);

  $('#retail_plus_tax').attr('value',retail_plus_tax);
  //alert(retail_plus_tax);
  var tx = parseInt(retail)-parseInt(retail_plus_tax);
  
  $('#retail_tax').attr('value',tx);

  // calculate wholesale price exclusive tax
  var wholesale = $('#id_wholesale_price').val();

  var wholesale_plus_tax = (parseInt(wholesale)*100)/(parseInt(tax)+100);
  wholesale_plus_tax=roundOff(wholesale_plus_tax);
   $('#wholesale_plus_tax').attr('value',wholesale_plus_tax);
   var wtx = parseInt(wholesale)-parseInt(wholesale_plus_tax);
   $('#wholesale_tax').attr('value',wtx);
  }
  $("#id_price").on("change keyup paste keydown", function(event) {    
      pricing();      
  });
  $("#id_product_tax").on("change onbur keyup keydown", function(event) {     
    getTax();   
    // calculate exclusive tax price values    
    pricing();  
  });
  $("#id_wholesale_price").on("change keyup paste keydown", function(event) {    
    pricing();  
  });
</script>
  <script type="text/javascript" >
  
    // Dynamic options
    // Tax field

    // Add options dynamically
    $(".selectbox-dynamic-options").selectBoxIt({
        autoWidth: false
    });  
    
  
  $( "#add-new-tax").on('click',function() {   
      var taxvalue = $( this ).val();         
      {% url "dashboard:tax-add-ajax" as url %} 
      var url = "{{ url }}";
      var csrf_token = jQuery("[name=csrfmiddlewaretoken]").val();
      var posting = $.post( url, {csrfmiddlewaretoken:csrf_token} );
      // Put the results in a div
      posting.done(function( data ) {    
        $("#add_tax_form" ).empty().append( data ); 
        $('#modal_add_tax').modal(); 
      });
    
   });
  
  
   function notify(msg) {
          new PNotify({
              text: msg,
              addclass: 'bg-danger'
          });
      }
  function refreshProductType()
  {
    notify('I will refresh product type page ');
    $('#productType').html('refresh me..!');    
    var url= "{% url 'dashboard:refresh_producttype' %}";
    var posting = $.get(url,{});
    posting.done(function(data){
      $( "#productType" ).empty().append( data );     
      notify('New product type added successfully','bg-success');
    });
  }
      
  $('#modal_add_tax_btn').on('click',function(){
    var tax = $('#id_tax').val();
    var tax_name = $('#id_tax_name').val();
    if(!$.isNumeric(tax)){ 
      notify('Enter a valid tax');
      return false; 
    }
    // post form data using jquery
    {% url "dashboard:tax-add-ajax" as url %} 
    var url = "{{ url }}";    
    // var csrf_token = "{% csrf_token %}";
    var posting = $.post( url, {tax:tax,tax_name:tax_name,} );
    // $('#modal_add_tax').modal('hide');
    posting.done(function( data ) { 
      
      $( "#add_tax_form" ).empty().append( data ); 
      
      if ($('#added').val() == 'added')
       {
         $('#modal_add_tax').modal('hide');
         $('#tax_field').empty().append(data);
       }else
       {                 
        $('#modal_add_tax').modal();
       }
     
      });
  });
  // end tax form
     // Dropdown selectors
    $('.pickadate-selectors').pickadate({
        format: 'yyyy-dd-mm',
        editable: true,  
        selectYears: true,
        selectMonths: true,
        formatSubmit: 'yyyy-dd-mm',

    });
    
    // Default initialization
    $(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });

    // Basic select
    $('.bootstrap-select').selectpicker();
  </script>
  <script>

  function getProductClass()
  {
    var pclass = $( "select[name*='product_class']").val();
    localStorage.setItem('product_class', parseInt(pclass));
    return parseInt(pclass);
  }
  getProductClass();
  // content locader
  // content wait loader
   function content_loader(val) {   
    var block = $(val).parent().parent().parent().parent().parent();
    
        $(block).block({ 
            message: '<i class="icon-spinner2 spinner"></i><br><span class="align-center">Please wait</span>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait',
                'box-shadow': '0 0 0 1px #ddd'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
   }   
  // end conttent blocker

  // refreshAttributes func
  function refreshAttributes() {  
   {% url "dashboard:fetch-variants" as url %} 
   var url = "{{ url }}";
   var class_pk = getProductClass();
   content_loader('#div_attributes');   
   var posting = $.post( url, {class_pk:class_pk} );
     // Put the results in a div
   posting.done(function( data ) {    
    $( "#div_attributes" ).empty().append( data ); 
    var block = $('#div_attributes').parent().parent().parent().parent().parent();   
      $(block).unblock(); 
  });

  }
  // end refreshAttributes

  // refreshsupplier func
  function refreshSupplier() {  
   {% url "dashboard:fetch_suppliers" as url %} 
   var url = "{{ url }}";
   var class_pk = getProductClass();
   content_loader('#div_supplier');   
   var posting = $.get( url, {} );
     // Put the results in a div
   posting.done(function( data ) {    
    $( "#div_supplier" ).empty().append( data );
    $('#modal_attribute').modal('hide'); 
    var block = $('#div_supplier').parent().parent().parent().parent().parent();   
      $(block).unblock(); 
  });

  }
  // end refreshsupplier

  $( "select[name*='product_class']").change(function refreshAttributes() {
  // Check input( $( this ).val() ) for validity here
  
   {% url "dashboard:fetch-variants" as url %} 
   var url = "{{ url }}";
   var class_pk = $( this ).val();
   var posting = $.post( url, {class_pk:class_pk} );
     // Put the results in a div
  posting.done(function( data ) {    
    $( "#div_attributes" ).empty().append( data );  });

  });

  $('.switch-actions').on('change', function() {
  let $btnChecked = $(this).parents('form').find('.btn-show-when-checked');
  let $btnUnchecked = $(this).parents('form').find('.btn-show-when-unchecked');
  if ($(this).parents('form').find('.switch-actions:checked').length) {
    $btnChecked.show();
    $btnUnchecked.hide();
  } else {
    $btnUnchecked.show();
    $btnChecked.hide();
  }
});

$('#form-product').validate({
    rules:{
        name: {
          required:true,
          minlength:3
        },
        description: {
          required:true,
          minlength:3
        },
      }
    });
  </script>
<script type="text/javascript">
  $('#id_description').attr('required','required');
</script>
<script type="text/javascript" src="{% static 'backend/js/backend.js' %}"></script>

{% if product.pk %}
<script type="text/javascript" src="{% static 'backend/js/plugins/media/fancybox.min.js' %}"></script>
<script type="text/javascript" src="{% static 'backend/js/pages/gallery.js' %}"></script>

{% endif %}
 {% endblock %}}
}
