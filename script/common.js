const app = new Vue({
  el: '#app', // Vue.jsを適用する要素のCSSセレクター 
  data() {
    return {
        image_name : "ファイル名",
    }
  },
  methods: {
    onImageUploaded(e) {
      // event(=e)から画像データを取得する
      const image = e.target.files[0];
      this.image_name=image.name;
    },
    Myrecipes_dropdown(){
      document.getElementById('Myrecipes').classList.toggle("is-active");
    }
  }
})

//材料テーブルjs
function deleteIngredient(element) {
    var row1 = element.closest('.ingredient_item');
    row1.parentNode.removeChild(row1);
  }
  
  function addIngredientRow() {
    var tbody1 = document.getElementById('ingredient_tbody');
    var newRow1 = document.createElement('tr');
    newRow1.className = 'ingredient_item';
    newRow1.innerHTML = `
      <td class="width55"><input type="text" class="input mb-2" name="ingredient_name[]" placeholder="材料" required></td>
      <td class="width35"><input type="text" class="input mb-2" name="ingredient_quantity[]" placeholder="分量" required></td>
      <td class="width5 clear-column pb-2"><span class="ingredient_close-icon" onclick="deleteIngredient(this)">✖</span></td>
    `;
    tbody1.appendChild(newRow1);
  }

  //作り方テーブルjs
  function deleteCooking(element) {
    var row2 = element.closest('.cooking_item');
    row2.parentNode.removeChild(row2);
  }
  
  function addCookingRow() {
    var tbody2 = document.getElementById('cooking_tbody');
    var newRow2 = document.createElement('tr');
    newRow2.className = 'cooking_item';
    newRow2.innerHTML = `
      <td class="width95 pr-2"><textarea class="textarea mb-2" name="cooking_procedure[]" placeholder="作り方" rows="2" cols="40" required></textarea></td>
      <td class="width5 clear-column pb-2"><span class="cooking_close-icon" onclick="deleteCooking(this)">✖</span></td>
    `;
    tbody2.appendChild(newRow2);
  }