<?php
namespace App\Http\Controllers;
use App\Problem;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProblemRepository;
class ProblemController extends Controller
{    
    protected $problems;
    /**
     * Create a new controller instance.
     *
     * @param  ProblemRepository  $problems
     * @return void
     */
    public function __construct(ProblemRepository $problems)
    {
        $this->middleware('auth');
        $this->problems = $problems;
    }
    /**
     * Display a list of all of the user's problem.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('problems.index', [
            'problems' => $this->problems->forUser($request->user()),
        ]);
    }
    /**
     * Create a new problem.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        $request->user()->problems()->create([
            'content' => $request->content,
        ]);
        return redirect('/problems');
    }
    /**
     * Destroy the given problem.
     *
     * @param  Request  $request
     * @param  Problem  $problem
     * @return Response
     */
    public function destroy(Request $request, Problem $problem)
    {
        $this->authorize('destroy', $problem);
        $problem->delete();
        return redirect('/problems');
    }

    /**
     * Destroy the given problem. Admin version
     *
     * @param  Request  $request
     * @param  Problem  $problem
     * @return Response
     */
    public function destroyByAdmin(Request $request, Problem $problem)
    {
        $this->authorize('adminAuthorization', $problem);
        $problem->delete();
        return redirect('admin/problems');
    }

    /**
     * Display all existing problems for admins to view.
     *
     * @return Response
     */
    public function adminView(Request $request)
    {
        return view('admin.problems', [
            'problems' => $this->problems->forAll(),
        ]);
    }
}