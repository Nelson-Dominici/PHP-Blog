<?php

namespace app\Modules\Post\Comment\Services;

use app\Entitys\Comments;
use app\Helpers\EntityManagerHelper;


class DeleteCommentService
{

	public static function delete(array $args, string $userUuid): void
	{
		
		$entityManager = EntityManagerHelper::getEntityManager();
		$commentRepository = $entityManager->getRepository(Comments::class);

		$comment = $commentRepository->findOneBy([
		    "userUuid" => $userUuid,
		    "commentUuid" => $args["commentUuid"]
		]);

		if ($comment) {

		    $entityManager->remove($comment);
		    $entityManager->flush();
		    
		}

	}

} 