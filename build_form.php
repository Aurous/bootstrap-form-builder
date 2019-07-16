<?php

if(isset($_POST['filters']) and $filters = json_decode($_POST['filters'])){
	print("<pre>".print_r(array_filter($filters),true)."</pre>");
	foreach(array_filter($filters) as $filter){
		echo $filter->filter_id;
	}
?>
<div class="col-xs-12" id="form_vue">
<template v-for="element in elements">
	<div v-bind:id="element.filter_id+'_group'" v-bind:data-size="element.colsize" class="form-group">
		<template v-if="element.label !== ''">
			<label  v-bind:for="element.filter_id">{{ element.label }}</label>
		</template>
		<template v-if="input_types.includes(element.filter_type_name)">
			<input class="form-control" v-bind:name="element.filter_name" v-bind:id="element.filter_id" v-bind:type="element.filter_type_name" v-bind="element.attributes">
		</template>
		<template v-else-if="element.filter_type_name == 'select'">
			<select class="form-control" v-bind:id="element.id" v-bind:name="element.filter_name" class="form-control" v-bind="element.attributes">
					<option v-for="option in element.options" v-bind:value="option.value">{{ option.name }}</option>
			</select>
		</template>
		<template v-else-if="element.filter_type_name == 'textarea'">
			<textarea class="form-control" v-bind:id="element.filter_id" v-bind:name="element.filter_name" >{{ element.value }}</textarea>
		</template>
		<template v-else-if="element.filter_type_name == 'datalist'">
			<input class="form-control" type="text" v-bind:id="element.filter_id" v-bind:name="element.filter_name" v-bind:list="element.filter_id+'-datalist'">
			<datalist v-bind:id="element.filter_id+'-datalist'">
				<template v-for="option in element.options">
					<option v-bind:value="option.name" v-bind:data-value="option.value"></option>
				</template>
			</datalist>
		</template>
		<template v-else-if="element.filter_type_name == 'buttons'">
			<button class="form-control" v-bind:name="element.filter_name" v-bind:id="element.filter_id" v-bind:type="element.filter_type_name" v-bind="element.attributes">{{ element.value }}</button>
		</template>
		<template v-else-if="element.filter_type_name == 'optgroup'">
			<select class="form-control" v-bind:name="element.filter_name" v-bind:id="element.filter_id" v-bind="element.attributes">
				<template v-for="(item, index) in element.options">
					<optgroup v-bind:label="index">
						<option v-for="option in item" v-bind:value="option.value">{{ option.name }}</option>
					</optgroup>
				</template>
			</select>
		</template>
	</div>
</template>
</div>
<script>
	var element_vue = new Vue({
		el: '#form_vue',
		data: {
			input_types:["button","checkbox","color","date","datetime-local","email","file","hidden","image","month","number","password","radio","range","reset","search","submit","tel","text","time","url","week"],
			elements:[
				]
		}
	})
</script>
<?php
}else{
	echo "failed";
}

?>