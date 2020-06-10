<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SendGrid\Mail\From;
use SendGrid\Mail\Mail;
use SendGrid\Mail\To;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::paginate(15);
        $data = [
            'posts' => $posts
        ];
        return view("posts", $data);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        $data = [
            "post" => $post
        ];
        return view("post", $data);
    }

    public function receiveEmailResponse(Request $request) {
        $from = $request->input("from");
        $to = $request->input("to");
        $body = $request->input("body");
        $spamScore = $request->input("spam_score");

        preg_match("#<(.*?)>#", $from, $fromArray);
        preg_match("#<(.*?)>#", $to, $toArray);
        $fromEmail = $fromArray[1];
        $toEmail = $toArray[1];
        $postId = explode($toEmail, "+")[1];
        $data = [
            'from' => $fromEmail,
            'to' => $toEmail,
            'post_id' => $postId,
            'body' => $body,
            'spam_score' => $spamScore
        ];
        Log::info("Received webhook: " + json_encode($data, JSON_PRETTY_PRINT));
    }

    public function sendMails() {
        $post = Post::find(1);

        $mails = [
            "Oulle1944@rhyta.com",
            "Quar1980@jourrapide.com"
        ];
        $subject = "SG Inbound Tutorial: ".$post->title;
        $from = "post-replies+".$post->id."@michaelokoko.com";
        $text = "Reply to this email to leave a comment on " . $post->title;

        $mail = new Mail();
        $sender = new From($from, "SG Inbound Tutorial");
        $recipients = [];
        foreach ($mails as $addr) {
            $recipients[] = new To($addr);
        }
        $mail->setFrom($sender);
        $mail->setSubject($subject);
        $mail->addTos($recipients);
        $mail->addContent("text/plain", $text);
        $sg = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sg->send($mail);
            $context = json_decode($response->body());
            if ($response->statusCode() == 202) {
                Log::info("Mail has been sent", ["context" => $context]);
            }else {
                Log::error("Failed to send mail", ["context" => $context]);
            }
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
