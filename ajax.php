<?php
if(isset($_REQUEST["tr_id"]))
{
echo '<tr class="tr" id="tr_'.$_REQUEST["tr_id"].'">
		<td>
			<div class="artist">
				Child Hidden : <input type="hi dden" id="child_hidden_id_'.$_REQUEST["tr_id"].'" value="1" />
				Artist Name : <input type="text" name="artist_name['.$_REQUEST["tr_id"].']"/>
				Act Size : <select name="act_size['.$_REQUEST["tr_id"].']">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
				Description : <textarea name="description['.$_REQUEST["tr_id"].']"></textarea>
				<a onclick="fnAddSubChild('.$_REQUEST["tr_id"].')">Add Child</a>
				<div class="response_child" id="response_child_'.$_REQUEST["tr_id"].'"></div>
			</div>
		</td>
	</tr>';
}


if(isset($_REQUEST["child_id"]))
{
	$intParentId = $_REQUEST["parent_id"];
	$intChildId = $_REQUEST["child_id"];
	$strNewArtist = "new_child_".$intParentId."_".$intChildId;
	echo '<div class="wrapper_child" id='.$strNewArtist.'>Hidden : <input type="hi dden" name="hidden_id" value="'.$_REQUEST["child_id"].'" />Artist Name : <input type="text" name="artist_name['.$_REQUEST["parent_id"].']['.$_REQUEST["child_id"].']" /><a onClick="fnRemoveChild('.$_REQUEST["parent_id"].','.$_REQUEST["child_id"].')"><b>Delete</b></a></div>';
}
?>