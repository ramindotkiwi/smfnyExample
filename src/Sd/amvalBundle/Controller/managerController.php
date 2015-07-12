<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\manager;
use Sd\amvalBundle\Form\managerType;

/**
 * manager controller.
 *
 */
class managerController extends Controller
{
    /**
     * Lists all manager entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:manager')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );

        // parameters to template
        return $this->render('SdamvalBundle:manager:index.html.twig', array('entities' => $pagination));
/*
        return $this->render('SdamvalBundle:manager:index.html.twig', array(
            'entities' => $entities,
        ));*/
    }

    /**
     * Creates a new manager entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new manager();
        $form = $this->createForm(new managerType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->setFlash('notice', 'با موفقیت ثبت شد.');
            return $this->redirect($this->generateUrl('manager'));
        }

        return $this->render('SdamvalBundle:manager:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new manager entity.
     *
     */
    public function newAction()
    {
        $entity = new manager();
        $form   = $this->createForm(new managerType(), $entity);

        return $this->render('SdamvalBundle:manager:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a manager entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:manager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find manager entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:manager:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing manager entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:manager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find manager entity.');
        }

        $editForm = $this->createForm(new managerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:manager:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing manager entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:manager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find manager entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new managerType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->setFlash('notice', 'با موفقیت ویرایش شد.');
            return $this->redirect($this->generateUrl('manager'));
        }

        return $this->render('SdamvalBundle:manager:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a manager entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:manager')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find manager entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('manager'));
    }

    public function delete2Action($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:manager')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find manager entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash('notice', 'با موفقیت حذف شد');
        //return $this->redirect($this->generateUrl('manager'));
        $entities = $em->getRepository('SdamvalBundle:manager')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render('SdamvalBundle:manager:del.html.twig', array(
            'entities' => $pagination,
        ));
    }
    /**
     * Creates a form to delete a manager entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:manager')->findByfn($request->get("namesearch"));

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render('SdamvalBundle:manager:index.html.twig', array(
        'entities' => $pagination,
    ));
    }
}
