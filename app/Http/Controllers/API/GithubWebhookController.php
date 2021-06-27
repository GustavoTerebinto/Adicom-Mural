<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Item;
use App\Model\User;
use App\Specification;

use App\Http\Resources\ItemResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ServiceResource;

class GithubWebhookController extends Controller
{
    function issueComment(Request $request){
        $gitReturn = $request->payload;
        $json = json_decode($gitReturn,true);
        
        try{
            $service = Item::where('github_issue_link', $json["issue"]["html_url"])->first();
        } catch(ErrorException $e){
            return response("Array está vazia", Responde::HTTP_BAD_REQUEST);
        }
        
        if(str_contains($json["comment"]["body"],"#cliente")){
            $json["comment"]["body"] = str_replace("#cliente","",$json["comment"]["body"]);
            $user = strcmp($json["comment"]["user"]["login"],"PracticeUFFSBot") == 0? "Meu comentário":"Equipe Practice";
            // CRIADO UM COMENTÁRIO
            if($json["action"] == 'created'){
                $comment = Item::create([
                    'user_id' => $service->user_id,
                    'parent_id' => $service->id,
                    'type' => Item::TYPE_COMMENT,
                    'title' => $user,
                    'description' => $json["comment"]["body"],
                    'hidden' => false,
                    'github_issue_link' => $json["comment"]["id"],
                    ]);
                    
                    return response(
                        new CommentResource($comment),
                        Response::HTTP_CREATED
                    );
                }  
                
                // EDITANDO UM COMENTÁRIO
                if($json["action"] == 'edited'){
                    $comment =  Item::where('github_issue_link', $json["comment"]["id"],)
                    ->first();
                    $comment->description = $json["comment"]["body"];
                    $comment->save();
                    return response(
                        new CommentResource($comment),
                        Response::HTTP_ACCEPTED
                    );
                }
                
                // DELETANDO UM COMENTÁRIO
                if($json["action"] == 'deleted'){
                    $comment =  Item::where('github_issue_link', $json["comment"]["id"],)
                    ->first();
                    $comment->delete();
                    return response(
                        new CommentResource($comment),
                        Response::HTTP_OK
                    );
                }
            }
    }

}
