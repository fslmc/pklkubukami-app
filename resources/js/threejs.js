import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';

document.addEventListener('DOMContentLoaded', function () {
  // Get the specific canvas element
  const canvas = document.getElementById('canvas');

  // Set up the scene, camera, and renderer
  const scene = new THREE.Scene();
  scene.background = null; // No background, just the model

  const camera = new THREE.PerspectiveCamera(75, canvas.clientWidth / canvas.clientHeight, 0.1, 1000);
  camera.position.z = 100; // Adjust this to move the camera closer or further from the model
  camera.position.y = 50; // Adjust the vertical position of the camera if needed

  const renderer = new THREE.WebGLRenderer({ canvas: canvas, antialias: true, alpha: true });
  renderer.setSize(canvas.clientWidth, canvas.clientHeight);
  renderer.setClearColor( 0x000000, 0 ); // Optional: Ensure the background is transparent

  // Load the 3D model
  const loader = new GLTFLoader();
  loader.load('assets/models/ElectricScooter.gltf', function (gltf) {
    const model = gltf.scene;
    scene.add(model);

    // Scale and position the model as needed
    model.scale.set(2, 2, 2); // Adjust the scale for the logo size
    model.position.set(0, 0, 0); // Center the model

    // Add ambient light
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
    scene.add(ambientLight);

    // Optional: Add directional light for better lighting
    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
    directionalLight.position.set(1, 1, 1).normalize();
    scene.add(directionalLight);

    // Animate the model
    function animate() {
      requestAnimationFrame(animate);
      model.rotation.y -= 0.01; // Spin the model
      renderer.render(scene, camera);
    }

    animate();
  }, undefined, function (error) {
    console.error(error);
  });

  // Handle window resize
  window.addEventListener('resize', () => {
    renderer.setSize(canvas.clientWidth, canvas.clientHeight);
    camera.aspect = canvas.clientWidth / canvas.clientHeight;
    camera.updateProjectionMatrix();
  });
});
