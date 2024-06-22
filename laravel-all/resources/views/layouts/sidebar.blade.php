<h3 class="btn btn-success mt-2">All Practice Topics - Must Do</h3>
<div class="list-group rounded mb-4 bg-secondary">
  <a href="{{ route('csv-import-process') }}" class="list-group-item text-danger font-weight-bold">CSV Import</a>
  <a href="{{ route('csv-export-process') }}" class="list-group-item text-danger font-weight-bold">CSV Export</a>
  <a href="{{ route('custom-artisan-process') }}" class="list-group-item text-danger font-weight-bold">Custom Artisan Command</a>
  <a href="{{ route('custom-route-process') }}" class="list-group-item text-danger font-weight-bold">Custom Route Files</a>
  <a href="{{ route('db-seeder-process') }}" class="list-group-item text-danger font-weight-bold">Database Seeder</a>
  <a href="{{ route('routes-process') }}" class="list-group-item text-danger font-weight-bold">Different Routes</a>
  <a href="{{ route('event-listener-process') }}" class="list-group-item text-danger font-weight-bold">Event & Listeners</a>
  <a href="{{ route('faker-seeder-process') }}" class="list-group-item text-danger font-weight-bold">Faker - Seeder</a>
  <a href="{{ route('form-validation-process') }}" class="list-group-item text-danger font-weight-bold">Form Field Validation</a>
  <a href="{{ route('helper-process') }}" class="list-group-item text-danger font-weight-bold">Helper Function</a>
  <a href="{{ route('image-upload-process') }}" class="list-group-item text-danger font-weight-bold">Image Upload</a>
  <a href="#" class="list-group-item text-danger font-weight-bold">Implement Queue</a>
  <a href="{{ route('mail-process') }}" class="list-group-item text-danger font-weight-bold">Mail</a>
  <a href="{{ route('middleware-process') }}" class="list-group-item text-danger font-weight-bold">Middleware</a>
  <a href="{{ route('multiple-route-process') }}" class="list-group-item text-danger font-weight-bold">Multiple Route File</a>
  <a href="{{ route('pagination-process') }}" class="list-group-item text-danger font-weight-bold">Pagination</a>
  <a href="{{ route('register-login-process') }}" class="list-group-item text-danger font-weight-bold">Register/Login</a>
  <a href="{{ route('softdelete-process') }}" class="list-group-item text-danger font-weight-bold">Soft Deletes</a>
  <a href="{{ route('send-email-process') }}" class="list-group-item text-danger font-weight-bold">Send Email Templates</a>
  <a href="{{ route('trait-process') }}" class="list-group-item text-danger font-weight-bold">Traits</a>
</div>
<style>
.list-group-item {
  border-bottom: 3px solid #ffc107 !important;
}

.list-group-item:last-child {
  border: none !important;
}
</style>