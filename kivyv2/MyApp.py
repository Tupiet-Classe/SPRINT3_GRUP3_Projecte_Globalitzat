from kivymd.app import MDApp
from kivymd.uix.screenmanager import MDScreenManager
from views.CourseScreen import CourseScreen
from views.DetailCourseScreen import DetailCourseScreen


class MyApp(MDApp):
    # Mètode per crear la classe, aquí estaria l'inici
    def build(self):
        self.title ="Inici"

if __name__ == "__main__":
    MyApp().run()
