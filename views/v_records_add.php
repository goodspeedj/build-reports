<form id="record-add" method="POST" action="/records/p_add">
  <pre>
    <?= $products ?>
  </pre>
  <select name="product">
    <option>eSales</option>
    <option>eService</option>
  </select>
  <select name="component">
    <option>eSales</option>
    <option>eService</option>
  </select>
	<input type="text" name="product" placeholder="" required><br />
</form>