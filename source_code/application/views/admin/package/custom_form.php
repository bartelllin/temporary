
<?
//var_dump($extra_content);
//debug($features);
//debug($package_features,1);
foreach ($features as $key => $value) {  
?>
<div class="form-group ">
<label for="" class="control-label col-md-2 "> 
    <?=$value['feature_name']?><span class="required">* </span>
</label>
      <div class="col-md-3">
        <input type="text" value="<?=(count($package_features) > 0 ? $package_features[$key]['feature_value'] : '')?>" name="package_feature[<?=$value['feature_id']?>]" id="package-feature_id_<?=$value['feature_id']?>" class=" form-control ">
        
        
      </div>
  </div>

  <?
}
  ?>