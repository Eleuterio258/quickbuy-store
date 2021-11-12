import 'package:flutter/material.dart';
import 'package:flutter_app/animation/scale_route.dart';
import 'package:flutter_app/pages/signIn_page.dart';
import 'package:flutter_app/widgets/TopMenus.dart';
import 'package:flutter_app/widgets/best_food_widget.dart';
import 'package:flutter_app/widgets/bottom_navbar_widget.dart';
import 'package:flutter_app/widgets/popular_foods_widget.dart';
import 'package:flutter_app/widgets/search_widget.dart';

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Color(0xFFFAFAFA),
        elevation: 0,
        title: Text(
          "What would you like to eat?",
          style: TextStyle(
              color: Color(0xFF3a3737),
              fontSize: 16,
              fontWeight: FontWeight.w500),
        ),
        brightness: Brightness.light,
        actions: <Widget>[
          IconButton(
              icon: Icon(
                Icons.notifications_none,
                color: Color(0xFF3a3737),
              ),
              onPressed: () {
                Navigator.push(
                  context,
                  ScaleRoute(
                    page: SignInPage(),
                  ),
                );
              })
        ],
      ),
      body: SingleChildScrollView(
        child: Column(
          children: <Widget>[
            SearchWidget(),
            TopMenus(),
            PopularFoodsWidget(),
            BestFoodWidget(),
          ],
        ),
      ),
      bottomNavigationBar: BottomNavBarWidget(),
    );
  }
}
