<link rel="stylesheet" type="text/css" href="css/bootstrap.css">


<div class="container bs-docs-container">
    <div class="row"> 

			<form  ng-submit="login()">
			  <div class="form-group">
			    <label>Email:</label>
			    <input class="form-control" type="email" ng-model="email" />
			  </div> 

			  <div class="form-group">
			    <label>Senha:</label>
			    <input class="form-control" type="password" ng-model="senha" />
			  </div>    

			    <input class="btn btn-default" type="submit" value="Login" />

			 </form>
	</div>
</div>

