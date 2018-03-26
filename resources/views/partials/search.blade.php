<form action="{{ route('search') }}" method="get">
  <i class="fa fa-search search-icon"></i>
  <input type="tex" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Rechercher des produits">
</form>
