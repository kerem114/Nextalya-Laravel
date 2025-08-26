<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModule extends Command
{
    protected $signature = 'make:modulesub {subName} {moduleName}';
    protected $description = 'Softby that organizes the process of creating Repository, Service, Interface and Request classes for a submodule within a parent module';

    public function handle()
    {
        $sub = ucfirst($this->argument('subName'));
        $module = ucfirst($this->argument('moduleName'));

        $basePath = base_path("modules/{$module}/app");

        $interfacesPath = "{$basePath}/Interfaces";
        $repositoriesPath = "{$basePath}/Repositories";
        $servicesPath = "{$basePath}/Services";
        $requestsPath = "{$basePath}/Http/Requests";
        $controllersPath = "{$basePath}/Http/Controllers";

        foreach ([$interfacesPath, $repositoriesPath, $servicesPath, $requestsPath] as $path) {
            File::ensureDirectoryExists($path);
        }

        File::put("{$interfacesPath}/{$sub}RepositoryInterface.php", $this->getRepositoryInterface($module, $sub));

        File::put("{$repositoriesPath}/{$sub}Repository.php", $this->getRepository($module, $sub));
        File::put("{$servicesPath}/{$sub}Service.php", $this->getService($module, $sub));

        File::put("{$requestsPath}/{$sub}CreateRequest.php", $this->getCreateRequest($module, $sub));
        File::put("{$requestsPath}/{$sub}UpdateRequest.php", $this->getUpdateRequest($module, $sub));

        File::put("{$controllersPath}/{$sub}ServiceController.php", $this->getController($module, $sub));
        $this->info("Submodule '{$sub}' created successfully under module '{$module}'. thank you for using Softby.");
    }

    private function getRepositoryInterface($module, $sub)
    {
        return "<?php

namespace Modules\\{$module}\Interfaces;

interface {$sub}RepositoryInterface
{
    // Repository interface methods
}
";
    }

    private function getRepository($module, $sub)
    {
        return "<?php

namespace Modules\\{$module}\Repositories;

use Modules\\{$module}\Interfaces\\{$sub}RepositoryInterface;

class {$sub}Repository implements {$sub}RepositoryInterface
{
    // Repository implementation
}
";
    }


    private function getService($module, $sub)
    {
        return "<?php

namespace Modules\\{$module}\Services;

use Modules\\{$module}\Interfaces\\{$sub}RepositoryInterface;

class {$sub}Service
{
    protected \${$sub}Repository;

    public function __construct({$sub}RepositoryInterface \${$sub}Repository)
    {
        \$this->{$sub}Repository = \${$sub}Repository;
    }

    // Service methods...
}
";
    }

    private function getCreateRequest($module, $sub)
    {
        return "<?php

namespace Modules\\{$module}\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class {$sub}CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // validation rules
        ];
    }

    /**
    * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;
    }
}
";
    }

    private function getUpdateRequest($module, $sub)
    {
        return "<?php

namespace Modules\\{$module}\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class {$sub}UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // validation rules
        ];
    }

    /**
    * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;
    }
}
";
    }
    private function getController($module, $sub)
    {
        return "<?php

namespace Modules\\{$module}\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\\{$module}\Services\\{$sub}Service;

class {$sub}ServiceController extends Controller
{
    public function __construct(public {$sub}Service \${$sub}Service) {}

    public function index()
    {
        // return some data from service
    }

}
";
    }
}
